<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $listChapter = [
                [
                    'title_chapters' => 'Đề T7/2010',
                    'description' => 'Chữa đề tháng 7 năm 2010',
                    'position' => '1',
                    'courses_id' => '1',
                ],
                [
                    'title_chapters' => 'Đề T7/2016',
                    'description' => 'Chữa đề tháng 7 năm 2016',
                    'position' => '2',
                    'courses_id' => '1',
                ],
                [
                    'title_chapters' => 'Đề T7/2017',
                    'description' => 'Chữa đề tháng 7 năm 2017',
                    'position' => '3',
                    'courses_id' => '1',
                ],
                [
                    'title_chapters' => 'Đề T7/2021',
                    'description' => 'Chữa đề tháng 7 năm 2021',
                    'position' => '4',
                    'courses_id' => '1',
                ], 
            ];
    
            DB::table('chapters')->insert($listChapter);
        } catch (\Throwable $th) {
            Log::error('Error seeding ChapterSeeder: ');

        }
    }
}
