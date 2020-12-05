<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_message', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->text('src')->nullable();
            $table->text('filename')->nullable();
            $table->tinyInteger('unread_s')->nullable();
            $table->tinyInteger('unread_m')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('management_message');
    }
}
