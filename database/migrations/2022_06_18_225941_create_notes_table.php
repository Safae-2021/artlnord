<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->string('student_id', 50);
            $table->string('training_id', 50);
            $table->Integer('part_training_id');
            $table->timestamps();


            $table->foreign('student_id')
            ->references('id')
            ->on('students')
            ->onDelete('cascade');

            $table->foreign('training_id')
            ->references('id')
            ->on('trainings')
            ->onDelete('cascade');

        
            $table->foreign('part_training_id')
            ->references('id')
            ->on('part_training')
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
        Schema::dropIfExists('notes');
    }
}
