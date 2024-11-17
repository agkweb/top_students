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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->foreignId('major_id');
            $table->foreign('major_id')->references('id')->on('student_majors')->onDelete('cascade');
            $table->integer('rank');
            $table->string('university');
            $table->string('behalf');
            $table->integer('year');
            $table->boolean('gender')->nullable();
            $table->string('text')->nullable();
            $table->string('voice')->nullable();
            $table->string('result')->nullable();
            $table->string('avatar');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
