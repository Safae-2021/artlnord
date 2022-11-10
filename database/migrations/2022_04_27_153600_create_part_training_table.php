<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_training', function (Blueprint $table) {
            $table->id();
            $table->Integer('part_id');
            $table->string('training_id');
            $table->timestamps();

            $table->foreign('training_id')
            ->references('id')
            ->on('trainings')
            ->onDelete('cascade');

            $table->foreign('part_id')
            ->references('id')
            ->on('parts')
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
        Schema::dropIfExists('part_training');
    }
}
