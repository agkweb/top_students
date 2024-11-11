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
            $table->boolean('gender');
            $table->string('major');
            $table->integer('rank');
            $table->string('university')->nullable();
            $table->string('behalf')->nullable();
            $table->string('text')->nullable();
            $table->integer('year');
            $table->string('voice')->nullable();
            $table->string('result')->nullable();
            $table->string('avatar')->default('avatar.png')->nullable();
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
