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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('courses_id');
            $table->string('name_courses');
            $table->string('description')->nullable();
            $table->string('thumbnail');
            $table->string('status');
            $table->string('list_author');
            $table->integer('enrollment_count')->nullable();
            $table->decimal('price', 20, 2);
            $table->string('category');
            $table->string('level');
            $table->string('name_folder_store')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->boolean('del_fg')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
