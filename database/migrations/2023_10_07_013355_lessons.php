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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id('lesson_id');
            $table->string('title_lesson');
            $table->string('author');
            $table->string('description')->nullable(true);
            $table->enum('type_content', ['video', 'document'])->nullable(true);
            $table->string('path_video')->nullable(true);
            $table->string('document_path')->nullable(true);
            $table->time('duration_lesson')->nullable(true);
            $table->integer('score')->nullable(true);
            $table->integer('chapters_id');
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
