<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupChatDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_chat_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned()->nullable();
            $table->foreign('member_id')->references('id')->on('students')->onDelete('cascade')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->bigInteger('group_chat_id')->unsigned()->nullable();
            $table->foreign('group_chat_id')->references('id')->on('group_chat')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('group_chat_detail');
    }
}
