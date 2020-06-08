<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_content_id')->unsigned()->nullable();
            $table->foreign('course_content_id')->references('id')->on('course_contents')->onDelete('cascade')->nullable();
            $table->text('question')->nullable();
            $table->text('choice_1')->nullable();
            $table->text('choice_2')->nullable();
            $table->text('choice_3')->nullable();
            $table->text('choice_4')->nullable();
            $table->integer('answer')->nullable();
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
        Schema::dropIfExists('question');
    }
}
