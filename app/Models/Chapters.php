<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lessons;

class Chapters extends Model
{
    use HasFactory;
    protected $table = 'chapters';
    protected $fillable = [
        'chapters_id',
        'title_chapters',
        'description',
        'position',
        'courses_id',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'chapters_id';
    public $incrementing = true;

}
