<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'courses_id',
        'name_courses',
        'description',
        'thumbnail',
        'status',
        'enrollmentCount',
        'price',
        'labelCourses',
        'startDate',
        'endDate',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'courses_id';
    public $incrementing = true;

    public function getListCourses($courses_id = null)
    {
        $courses = $this->select();
        if (!is_null($courses_id)) {
            $courses->where('courses_id', '=', $courses_id);
        }

        return $courses->get();
    }

    public function getListCoursesByName($name)
    {
        return $this->select()->where('name_courses', 'like', "%{$name}%")->get();
    }

    public function getListCoursesSelect($level, $category)
    {
        return $this->select()->where([
            ['level', '=', $level],
            ['category', '=', $category]
        ])->get();
    }
}
