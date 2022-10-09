<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_sections', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('level_id')->unsigned();
            $table->bigInteger('section_id')->unsigned();
            $table->bigInteger('matter_id')->unsigned();
            $table->bigInteger('cicle_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('period_id')->unsigned();
            $table->text('description')->nullable();
            $table->tinyInteger('is_active')->default('1');
            $table->tinyInteger('is_finished')->default('0');
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('matter_id')->references('id')->on('matters');
            $table->foreign('cicle_id')->references('id')->on('cicles');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('period_id')->references('id')->on('periods'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_sections');
    }
}
