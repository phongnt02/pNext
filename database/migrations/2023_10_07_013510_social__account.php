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
        Schema::create('Social', function (Blueprint $table) {
            $table->id('social_id');
            $table->enum('provider', ['facebook', 'google']);
            $table->unsignedBigInteger('provider_user_id');
            $table->string('access_token');
            $table->string('refresh_token');
            $table->unsignedBigInteger('user_id');
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
