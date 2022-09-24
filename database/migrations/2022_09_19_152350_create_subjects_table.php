<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name_subject',75);
            $table->integer('curse');
            $table->timestamps();
            $table->foreignId('teacher_id')->references('id')->on('teachers');
        });

        /*Schema::table('subjects', function (Blueprint $table) {
            $table->foreignId('teacher_id')->references('id')->on('teachers');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
