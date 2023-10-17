<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Courses;
use App\Models\Chapters;
use App\Models\Lessons;

class CoursesController extends Controller
{
    private $courses;
    private $chapters;
    private $lessons;
    public function __construct(Courses $courses, Chapters $chapters, Lessons $lessons)
    {
        $this->courses = $courses;
        $this->chapters = $chapters;
        $this->lessons = $lessons;
    }
    public function getListCourses()
    {
        return response()->json([
            'data' => $this->courses->getListCourses()
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        return response()->json([
            'data' => $this->courses->getListCoursesByName($keyword),
        ]);
    }

    public function searchSelect(Request $request)
    {
        $level = $request->input('level');
        $categogy = $request->input('categogy');
        return response()->json([
            'data' => $this->courses->getListCoursesSelect($level, $categogy)
        ]);
    }

    public function getDataLearnDefault(Request $request)
    {
        $idCourses = $request->input('courses_id');
        $data = [];
        $listChapters = $this->chapters->select('chapters_id', 'title_chapters', 'description', 'courses_id')
                            ->where('courses_id', '=', $idCourses)
                            ->orderBy('position')
                            ->get();
    
        foreach ($listChapters as $chapter) {
            $lessons = $this->lessons
                            ->select()
                            ->where('chapters_id', $chapter->chapters_id)
                            ->get();
                            
            foreach ($lessons as $lesson ) {
                if (!empty($lesson['path_video'])) {
                    $params = explode('/', $lesson['path_video']);
                    $lesson['path_video'] = route('resource.show', [
                        'name_folder_store' => $params[0],
                        'file_name' => $params[1],
                    ]);
                }
            }

            array_push($data, [
                'chapter'=> $chapter,
                'lesson' => $lessons
            ]);
        }
        

        return response()->json([
            'courses' => $this->courses->getListCourses($idCourses)->first(),
            'dataTabList' => $data,
        ]);
    }
}
