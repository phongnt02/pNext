<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Courses_User', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('courses_id');
            $table->integer('progress');
            $table->unsignedBigInteger('current_lessons_id');
            $table->time('registration_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
