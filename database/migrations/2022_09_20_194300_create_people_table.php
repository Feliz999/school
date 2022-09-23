<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',200);
            $table->string('phone',10);
            $table->string('cui',13)->nullable();
            $table->string('address',150)->nullable();
            $table->string('email',100)->nullable();
            $table->date('birthday');
            $table->bigInteger('type_people_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_people_id')->references('id')->on('type_people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
