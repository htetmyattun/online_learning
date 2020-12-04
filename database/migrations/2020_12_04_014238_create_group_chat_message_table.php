<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupChatMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_chat_message', function (Blueprint $table) {
            $table->id();            
            $table->text('message')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->text('src')->nullable();
            $table->text('filename')->nullable();
            $table->bigInteger('group_chat_id')->unsigned()->nullable();
            $table->foreign('group_chat_id')->references('id')->on('group_chat')->onDelete('cascade')->nullable();
            $table->bigInteger('sender_id')->unsigned()->nullable();
            $table->foreign('sender_id')->references('id')->on('students')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('group_chat_message');
    }
}
