<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('label');
            // $table->Integer('room_id');
            $table->date('startdate');
            $table->date('enddate');
            $table->time('starttime');
            $table->time('endtime');
            // $table->string('teacher_id');
            // $table->Integer('studenttotalnumber');
            $table->text('description');
            // $table->Integer('order');
            $table->boolean('status');
            $table->softDeletes()->default(null);
            $table->timestamps();

            // $table->foreign('room_id')
            // ->references('id')
            // ->on('rooms')
            // ->onDelete('cascade');

            // $table->foreign('teacher_id')
            // ->references('id')
            // ->on('teachers')
            // ->onDelete('cascade');

           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
