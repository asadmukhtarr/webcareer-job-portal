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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('picture')->nullable();
            $table->integer('user_id');
            $table->integer('phone')->nullable();
            $table->text('location')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->text('headling')->nullable();
            $table->text('about')->nullable();
            $table->text('current_position')->nullable();
            $table->text('experience_level')->nullable();
            $table->text('skills')->nullable();
            $table->text('resume')->nullable();
            $table->text('linkedn')->nullable();
            $table->text('github')->nullable();
            $table->text('twitter')->nullable();
            $table->text('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
