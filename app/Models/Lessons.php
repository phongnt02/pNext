<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;
    protected $table = 'lessons';
    protected $fillable = [
        'lessons_id',
        'title_lesson',
        'author',
        'description',
        'type_content',
        'path_video',
        'document_path',
        'path_subtitle_en',
        'path_subtitle_vi',
        'path_subtitle_jp',
        'duration_lesson',
        'score',
        'chapters_id',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'lessons_id';
    public $incrementing = true;
    public $timestamps = true;

    public function getListLessons ($lesson_id = null) {
        $lesson = $this->select();
        if (!is_null($lesson_id)) {
            $lesson->where('lessons_id', '=', $lesson_id);
        }

        return $lesson->get();
    }
}
