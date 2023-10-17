<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    private $courses;
    public function __construct(Courses $courses)
    {
        $this->courses = $courses;
    }
    public function getListCourses() {
        return response()->json([
            'data' => $this->courses->getListCourses()
        ]);
    }

    public function search (Request $request) {
        $keyword = $request->input('keyword');
        return response()->json([
            'data' => $this->courses->getListCoursesByName($keyword),
        ]);
    }

    public function searchSelect (Request $request) {
        $level = $request->input('level');
        $categogy = $request->input('categogy');
        return response()->json([
            'data' => $this->courses->getListCoursesSelect($level, $categogy)
        ]);
    }
}
