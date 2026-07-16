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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('title')->nullable();
            $table->string('type')->nullable();
            $table->text('location')->nullable();
            $table->text('salary')->nullable();
            $table->text('skills')->nullable();
            $table->text('description')->nullable();
            $table->text('vacancies')->nullable();
            $table->text('requirements')->nullable();
            $table->text('experience')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
