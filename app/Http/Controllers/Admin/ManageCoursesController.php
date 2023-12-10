<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ListBag\ListBag;

class ManageCoursesController extends Controller
{
    public function index (Request $request) {
        $listBag = new ListBag('courses');
        $search = $request->get('SearchTransform');
        dump(old('SearchTransform'));
        $listBag->getResultSearch($search);
        return view('admin.courses.index',[
            'page_title' => 'Courses Manage',
            'listBag' => $listBag
        ]);
    }

    public function add () {
        return view('admin.courses.add',[
            'page_title' => 'Courses Manage',
        ]);
    }

    public function store (Request $request) {
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            Storage::disk('courses')->put('N3', $video);
        }
    
        return redirect()->back();
    }
}
