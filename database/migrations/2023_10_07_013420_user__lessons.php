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
        Schema::create('User_lessons', function (Blueprint $table) {
            $table->id('id_lesson');
            $table->unsignedBigInteger('user_id');
            $table->enum('type_content', ['note', 'comment'])->nullable(); 
            $table->string('note')->nullable(); 
            $table->string('comment')->nullable(); 
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
