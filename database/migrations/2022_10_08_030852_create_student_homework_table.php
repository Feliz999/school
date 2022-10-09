<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_homework', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('homework_id')->unsigned();
            $table->bigInteger('matter_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('level_section_id')->unsigned();
            $table->integer('points')->default('0');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('homework_id')->references('id')->on('homework');
            $table->foreign('matter_id')->references('id')->on('matters');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('level_section_id')->references('id')->on('level_sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_homework');
    }
}
