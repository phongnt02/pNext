<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $listLessons = [
                [
                    'title_lesson' => 'Chữa đề từ vựng 問題1',
                    'author' => 'dungmorri',
                    'description' => 'test',
                    'type_content' => 'video',
                    'path_video' => '',
                    'document_path' => '',
                    'duration_lesson' => '1200',
                    'score' => 0,
                    'chapters_id' => '1',
                ],
                [
                    'title_lesson' => 'Chữa đề từ vựng 問題2',
                    'author' => 'dungmorri',
                    'description' => 'test',
                    'type_content' => 'video',
                    'path_video' => '',
                    'document_path' => '',
                    'duration_lesson' => '1000',
                    'score' => 0,
                    'chapters_id' => '1',
                ],
                [
                    'title_lesson' => 'Chữa đề từ vựng 問題3',
                    'author' => 'dungmorri',
                    'description' => 'test',
                    'type_content' => 'video',
                    'path_video' => '',
                    'document_path' => '',
                    'duration_lesson' => '900',
                    'score' => 0,
                    'chapters_id' => '1',
                ],
                [
                    'title_lesson' => 'Chữa đề từ vựng 問題4',
                    'author' => 'dungmorri',
                    'description' => 'test',
                    'type_content' => 'video',
                    'path_video' => '',
                    'document_path' => '',
                    'duration_lesson' => '900',
                    'score' => 0,
                    'chapters_id' => '2',
                ]
            ];

            DB::table('lessons')->insert($listLessons);
        } catch (\Throwable $th) {
            Log::error('Error seeding LessonSeeder: ' . $th->getMessage());
        }
    }
}
