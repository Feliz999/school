<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('code',100);
            $table->string('fullname',200);
            $table->string('phone',15);
            $table->date('birthday');
            $table->string('cui',15)->nullable();
            $table->string('address',150)->nullable();
            $table->string('email',150)->nullable();
            $table->string('picture_student',200)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('is_active')->default(1);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
