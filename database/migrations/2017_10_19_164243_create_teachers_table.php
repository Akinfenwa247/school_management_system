<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('teachers')) {
            Schema::create('teachers', function (Blueprint $table) {
                $table->increments('teacher_id');
                $table->boolean('status');
                $table->string('name');
                $table->string('birthday')->nullable();
                $table->enum('gender', array('Male', 'Female'));
                $table->string('designation')->nullable();
                $table->string('class')->nullable();
                $table->string('address')->nullable();
                $table->string('phone')->nullable();
                $table->string('image')->nullable();

                $table->timestamps();
                });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
