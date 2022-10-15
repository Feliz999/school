<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->id();
            $table->string('name',150);
            $table->integer('points');
            $table->datetime('date_expiration');
            $table->text('description')->nullable();
            $table->tinyinteger('is_active')->default(1);
            $table->bigInteger('type_homework_id')->unsigned();
            $table->bigInteger('matter_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_homework_id')->references('id')->on('type_homework');
            $table->foreign('matter_id')->references('id')->on('matters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homework');
    }
}
