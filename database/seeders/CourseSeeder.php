<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $listCourses = [
                [
                    'name_courses' => 'Luyện đề N3 DungMorri',
                    'description' => 'Cung cấp các video bài giảng, đề thi sát với kỳ thi JLPT',
                    'thumbnail' => 'https://dungmori.com/cdn/course/default/1690873005_37035_14f279.png',
                    'status' => '1',
                    'enrollmentCount' => 200,
                    'price' => 2300000.00,
                    'category' => 'JLPT',
                    'level' => 'N3',
                    'startDate' => '2023-10-19 00:56:10',
                    'endDate' => '2023-10-19 00:56:10',
                ],
                [
                    'name_courses' => 'Luyện đề N3 Riki',
                    'description' => 'Cung cấp các video bài giảng, đề thi sát với kỳ thi JLPT',
                    'thumbnail' => 'https://cdn.riki.edu.vn/mb/images/isocial_group.png',
                    'status' => '1',
                    'enrollmentCount' => 222,
                    'price' => 2000000.00,
                    'category' => 'JLPT',
                    'level' => 'N3',
                    'startDate' => '2023-10-19 00:56:10',
                    'endDate' => '2023-10-19 00:56:10',
                ],
                [
                    'name_courses' => 'Luyện đề N4',
                    'description' => 'Cung cấp các video bài giảng, đề thi sát với kỳ thi JLPT',
                    'thumbnail' => 'https://dungmori.com/cdn/course/default/1690872820_49380_d3f430.png',
                    'status' => '1',
                    'enrollmentCount' => 123,
                    'price' => 700000.00,
                    'category' => 'JLPT',
                    'level' => 'N4',
                    'startDate' => '2023-10-19 00:56:10',
                    'endDate' => '2023-10-19 00:56:10',
                ],
                [
                    'name_courses' => 'Giao tiếp sơ cấp',
                    'description' => 'Các mẫu câu giao tiếp trong cuộc sống hằng ngày',
                    'thumbnail' => 'https://i.ytimg.com/vi/UHefy9s18Mg/maxresdefault.jpg',
                    'status' => '1',
                    'enrollmentCount' => 30,
                    'price' => 700000.00,
                    'category' => 'Kaiwa',
                    'level' => 'N4',
                    'startDate' => '2023-10-19 00:56:10',
                    'endDate' => '2023-10-19 00:56:10',
                ]
            ];

            DB::table('courses')->insert($listCourses);
            
        } catch (\Exception $e) {
            Log::error('Error seeding CoursesSeeder: ' . $e->getMessage());
        }
    }
}
