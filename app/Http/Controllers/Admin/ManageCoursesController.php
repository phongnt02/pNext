<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Helpers\ListBag\ListBag;
use App\Models\Courses;

class ManageCoursesController extends Controller
{
    public $courses;

    public function __construct(Courses $courses)
    {
        $this->courses = $courses;
    }
    public function index (Request $request) {
        $request->flash();
        $listBag = new ListBag('courses');
        $search = $request->get('name_courses');
        $listBag->index($search);
        return view('admin.courses.index',[
            'page_title' => 'Courses Manage',
            'breadcrumbs' => 'courses.index',
            'listBag' => $listBag
        ]);
    }
    
    public function add () {
        return view('admin.courses.form',[
            'page_title' => 'Add Courses',
            'breadcrumbs' => 'courses.add',
            'mode' => 'create',
            'data' => []
        ]);
    }

    public function store(Request $request)
    {
        $request->flash();
        $nameFolderStore = $request->input('name_folder_store');

        DB::beginTransaction();
        try {
            $thumbnailPath = null;
            if (!Storage::disk('store_server')->exists($nameFolderStore)) {
                Storage::disk('store_server')->makeDirectory($nameFolderStore);
            }
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = 'thumbnail_' . time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnailPath = $thumbnail->storeAs($nameFolderStore, $thumbnailName, 'store_server');
            }

            $this->courses->insert([
                'name_courses' => $request->input('name_courses'),
                'level' => $request->input('level'),
                'list_author' => $request->input('list_author'),
                'price' => $request->input('price'),
                'category' => $request->input('category'),
                'status' => $request->input('status'),
                'name_folder_store' => $nameFolderStore,
                'thumbnail' => $thumbnailPath ?? '',
                'description' => $request->input('description') ?? null,
                'start_date' =>  $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->input());
        }
        return redirect()->route('courses.index')->withInput(['name_courses' => old('name_courses')]);
    }
    
    public function edit (Request $request) {
        $coursesId = $request->get('courses_id');
        $data = $this->courses->getListCourses($coursesId)->first()->toArray();

        return view('admin.courses.form',[
            'page_title' => 'Edit Courses',
            'breadcrumbs' => 'courses.edit',
            'mode' => 'edit',
            'data' => $data
        ]);
    }

    public function update (Request $request) {
        $request->flash();
        $nameFolderStore = $request->input('name_folder_store');
        DB::beginTransaction();
        try {
            $thumbnailPath = null;
            if (!Storage::disk('store_server')->exists($nameFolderStore)) {
                Storage::disk('store_server')->makeDirectory($nameFolderStore);
                $oldNameFolderStore = $this->courses->where('courses_id', $request->get('courses_id'))->value('name_folder_store');
                Storage::disk('store_server')->deleteDirectory($oldNameFolderStore);
            }
            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = 'thumbnail_' . time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnailPath = $thumbnail->storeAs($nameFolderStore, $thumbnailName, 'store_server');
            }


            $this->courses->where('courses_id', $request->get('courses_id'))
            ->update([
                'name_courses' => $request->get('name_courses'),
                'description' => $request->get('description'),
                'thumbnail' => $thumbnailPath ?? '',
                'status' => $request->get('status'),
                'list_author' => $request->get('list_author'),
                'enrollment_count' => $request->get('enrollment_count'),
                'price' => $request->get('price'),
                'category' => $request->get('category'),
                'level' => $request->get('level'),
                'name_folder_store' => $request->get('name_folder_store'),
                'start_date' => $request->get('start_date'),
                'end_date' => $request->get('end_date'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->input());
        }
        return redirect()->route('courses.index')->withInput(['name_courses' => old('name_courses')]);
    }

    public function delete (Request $request) {
        $coursesId = $request->get('courses_id');
        $courses = $this->courses->where('courses_id',$coursesId);
        $result = Storage::disk('store_server')->deleteDirectory($courses->value('name_folder_store'));
        if ($result) {
            $courses->delete();
        }

        return redirect()->route('courses.index')->withInput(['name_courses' => old('name_courses')]);
    }

}
