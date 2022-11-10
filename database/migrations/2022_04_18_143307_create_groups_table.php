<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('training_id',50);
            $table->Integer('room_id');
            $table->string('teacher_id',50);
            $table->timestamps();

            $table->foreign('training_id')
            ->references('id')
            ->on('trainings')
            ->onDelete('cascade');
            
            $table->foreign('room_id')
            ->references('id')
            ->on('rooms')
            ->onDelete('cascade');

            $table->foreign('teacher_id')
            ->references('id')
            ->on('teachers')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
