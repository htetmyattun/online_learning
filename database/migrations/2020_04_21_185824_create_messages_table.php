<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->bigInteger('lecturer_id')->unsigned()->nullable();
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->string('message');
            $table->tinyInteger('status');
            $table->tinyInteger('unread_s');
            $table->tinyInteger('unread_l');
            $table->text('src')->nullable();
            $table->text('filename')->nullable();
            $table->tinyInteger('type')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
