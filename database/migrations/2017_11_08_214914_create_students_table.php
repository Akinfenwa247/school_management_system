<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('student_id')->nullable();
            $table->string('first_name',20)->nullable();
            $table->string('last_name',20)->nullable();
            $table->string('middle_name',20)->nullable();
            $table->string('sex', 10)->nullable();
            $table->string('dob', 20)->nullable();
            $table->string('image',50)->nullable();
            $table->string('address',100)->nullable();
            $table->string('SOO',50)->nullable();
            $table->string('LGOO',50)->nullable();
            $table->string('class_id')->nullable();
            $table->string('nationality',50)->nullable();
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
