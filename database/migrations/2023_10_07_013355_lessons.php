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
            $table->id('id_lesson');
            $table->string('title_lesson');
            $table->string('author');
            $table->string('description');
            $table->enum('type_content', ['video', 'document']);
            $table->string('path_video');
            $table->string('document_path');
            $table->time('duration_lesson');
            $table->integer('score');
            $table->integer('id_chapters');
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
