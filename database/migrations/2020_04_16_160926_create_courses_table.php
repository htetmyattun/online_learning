<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('lecturer_id')->unsigned()->nullable();
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->float('price',12,2)->nullable();
            $table->float('discount_price',8,2)->nullable();
            $table->string('description')->nullable();
            $table->string('entry_requirements')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('duration')->nullable();
            $table->string('preview')->nullable();
            $table->string('career')->nullable();
            $table->string('exam_information')->nullable();
            $table->string('live_id')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
