<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ListBag\ListBag;
use App\Models\Chapters;

class ManageChaptersController extends Controller
{
    public $chapters;
    public function __construct(Chapters $chapters)
    {
        $this->chapters = $chapters;
    }

    public function index (Request $request, $courses_id) {
        $request->flash();
        $request->session()->put('courses_id', $courses_id);
        $listBag = new ListBag('chapters');
        $search = $request->get('name_chapters');
        $listBag->index($search, $courses_id);
        return view('admin.chapters.index',[
            'page_title' => 'Chapters Manage',
            'breadcrumbs' => 'chapters.index',
            'breadcrumbs_id' => $courses_id,
            'listBag' => $listBag,
            'courses_id' => $courses_id
        ]);
    }

    public function add (Request $request) {
        $courses_id = $request->get('courses_id');
        return view('admin.chapters.form',[
            'page_title' => 'Chapters Manage',
            'breadcrumbs' => 'chapters.add',
            'breadcrumbs_id' => $courses_id,
            'mode' => 'create',
            'data' => [],
            'courses_id' => $courses_id
        ]);
    }

    public function store (Request $request) {
        $request->flash();
        DB::beginTransaction();
        try {
            $this->chapters->create($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->input());
        }
        return redirect()->route('chapters.index',$request->get('courses_id'));
    }

    public function edit ($chapters_id) {
        $data = $this->chapters->getListChapters($chapters_id)->first()->toArray();

        return view('admin.chapters.form',[
            'page_title' => 'Chapters Manage',
            'breadcrumbs' => 'chapters.edit',
            'breadcrumbs_id' => $data['courses_id'],
            'mode' => 'edit',
            'data' => $data
        ]);
    }

    public function update (Request $request) {
        $request->flash();
        DB::beginTransaction();
        try {
            $this->chapters->where('chapters_id', $request->get('chapters_id'))
            ->update([
                'title_chapters' => $request->get('title_chapters'),
                'description' => $request->get('description'),
                'position' => (int)$request->get('position'),
            ]);
        
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('danger', $e->getMessage());
            return redirect()->back()->withInput($request->input());
        }
        session()->flash('success', 'Updated Chapters');
        return redirect()->back()->withInput($request->input());
    }

    public function delete (Request $request) {
        $chaptersId = $request->get('chapters_id');
        $chapters = $this->chapters->where('chapters_id',$chaptersId);
        $chapters->delete();
        return redirect()->back()->withInput();
    }
}
