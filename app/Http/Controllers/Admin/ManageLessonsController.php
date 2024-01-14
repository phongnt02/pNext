<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Helpers\ListBag\ListBag;
use App\Models\Lessons;
use App\Models\Chapters;
use App\Models\Courses;
use App\Http\Service\Subtitle;

class ManageLessonsController extends Controller
{
    private $lessons;
    public function __construct(Lessons $lessons)
    {
        $this->lessons = $lessons;
    }
    public function index (Request $request, $chapters_id) {
        $request->flash();
        $listBag = new ListBag('lessons');
        $search = $request->get('title_lessons');
        $listBag->index($search, $chapters_id);
        return view('admin.lessons.index',[
            'page_title' => 'Lessons Manage',
            'breadcrumbs' => 'lessons.index',
            'breadcrumbs_id' => $chapters_id,
            'listBag' => $listBag,
            'chapters_id' => $chapters_id
        ]);
    }

    public function add (Request $request) {
        $chapters_id = $request->get('chapters_id');
        return view('admin.lessons.form',[
            'page_title' => 'Lessons Manage',
            'breadcrumbs' => 'lessons.add',
            'breadcrumbs_id' => $chapters_id,
            'mode' => 'create',
            'data' => [],
            'chapters_id' => $chapters_id
        ]);
    }

    public function store (Request $request) {
        $request->flash();
        $chapterId  = $request->get('chapters_id');
        $dataInsert = [];
        DB::beginTransaction();
        try {
            $coursesId  = Chapters::where('chapters_id', $chapterId)->value('courses_id');
            $nameFolderStore = Courses::where('courses_id', $coursesId)->value('name_folder_store');
            if ($request->hasFile('lesson_file')) {
                $lessonFile = $request->file('lesson_file');
                $nameFile = $request->get('title_lesson') . '_' . Carbon::now('Asia/Ho_Chi_Minh')->toDateString() . '.' . $lessonFile->getClientOriginalExtension();
                $path = $lessonFile->storeAs($nameFolderStore, $nameFile, 'store_server');

                $dataInsert = [
                    'path_video' => ($request->get('type_content') == 'video') ? $path : null,
                    'document_path' => ($request->get('type_content') == 'document') ? $path : null,
                ];

                if($request->get('subtitle') == "1" && ($request->get('type_content') == 'video')) {
                    $subtitle = new Subtitle();
                    $pathFileVttEn = $subtitle->saveSubtitleDefault($nameFolderStore, $dataInsert['path_video']);
                    $pathFileVttVi = $subtitle->translateSubtitle('Vietnamese', $pathFileVttEn, $nameFolderStore, $dataInsert['path_video']);
                    $pathFileVttJp = $subtitle->translateSubtitle('Japaneses', $pathFileVttEn, $nameFolderStore, $dataInsert['path_video']);
                    $dataInsert['path_subtitle_en'] = $pathFileVttEn;
                    $dataInsert['path_subtitle_vi'] = $pathFileVttVi;
                    $dataInsert['path_subtitle_jp'] = $pathFileVttJp;
                }
            }

            $this->lessons->create(array_merge($dataInsert, $request->all()));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->input());
        }
        return redirect()->route('lessons.index', $chapterId);
    }

    public function edit ($lessonsId) {
        $data = $this->lessons->getListLessons($lessonsId)->first()->toArray();
        return view('admin.lessons.form',[
            'page_title' => 'Lessons Manage',
            'breadcrumbs' => 'lessons.edit',
            'breadcrumbs_id' => $data['chapters_id'],
            'mode' => 'edit',
            'data' => $data
        ]);
    }

    public function update (Request $request) {
        $request->flash();
        DB::beginTransaction();
        try {
            $record = $this->lessons->where('lessons_id', $request->get('lessons_id'));
            if ($request->hasFile('lesson_file')) {
                Storage::disk('store_server')->delete($record->value('path_video') ?? $record->value('document_path'));
                $coursesId  = Chapters::where('chapters_id', $record->value('chapters_id'))->value('courses_id');
                $nameFolderStore = Courses::where('courses_id', $coursesId)->value('name_folder_store');
                $thumbnail = $request->file('lesson_file');
                $nameFile = $request->get('title_lesson') . '_' . Carbon::now('Asia/Ho_Chi_Minh')->toDateString() . '.' . $thumbnail->getClientOriginalExtension();
                $path = $thumbnail->storeAs($nameFolderStore, $nameFile, 'store_server');

            }

            $record->update([
                'title_lesson' => $request->get('title_lesson'),
                'author' => $request->get('author'),
                'description' => $request->get('description'),
                'type_content' => $request->get('type_content'),
                'duration_lesson' => $request->get('duration_lesson'),
                'score' => $request->get('score'),
                'path_video' => ($request->get('type_content') == 'video') && isset($path) ? $path : $record->value('path_video'),
                'document_path' => ($request->get('type_content') == 'document') && isset($path) ? $path : $record->value('document_path'),
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->input());
        }
        session()->flash('success', 'Updated Lessons');
        return redirect()->back()->withInput($request->input());
    }

    public function delete (Request $request) {
        $lessonsId = $request->get('lessons_id');
        $lessons = $this->lessons->where('lessons_id',$lessonsId);
        $result = Storage::disk('store_server')->delete($lessons->value('path_video') ?? $lessons->value('document_path'));
        if ($result) {
            $lessons->delete();
        }
        return redirect()->back()->withInput();
    }
}
