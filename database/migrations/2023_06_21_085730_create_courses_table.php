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
            $table->id('id_courses');
            $table->string('name_courses');
            $table->string('description');
            $table->string('thumbnail');
            $table->string('status');
            $table->integer('enrollmentCount');
            $table->decimal('price', 20, 2);
            $table->string('category');
            $table->string('level');
            $table->timestamp('startDate')->nullable();
            $table->timestamp('endDate')->nullable();
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
