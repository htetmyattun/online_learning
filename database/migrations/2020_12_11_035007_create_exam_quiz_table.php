<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_quiz', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('exam_id')->unsigned()->nullable();
            $table->foreign('exam_id')->references('id')->on('exam')->onDelete('cascade');
            $table->string('question')->nullable();
            $table->string('choice_1')->nullable();
            $table->string('choice_2')->nullable();
            $table->string('choice_3')->nullable();
            $table->string('choice_4')->nullable();
            $table->string('answer')->nullable();
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
        Schema::dropIfExists('exam_quiz');
    }
}
