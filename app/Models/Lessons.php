<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;
    protected $table = 'lessons';
    protected $fillable = [
        'lesson_id',
        'title_lesson',
        'author',
        'description',
        'type_content',
        'path_video',
        'document_path',
        'duration_lesson',
        'score',
        'id_chapters',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'lesson_id';
    public $incrementing = true;

}
