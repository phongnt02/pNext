<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            'courses_name' => 'Luyện đề N3',
            'courses_cost' => '1300000',
            'count_member' => '200',
            'course_thumbnail' => 'https://dungmori.com/cdn/course/default/1642045740_37035_948975.png',
        ]);
    }
}
