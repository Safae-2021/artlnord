<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingRequesteddocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_requesteddocuments', function (Blueprint $table) {
            $table->id();
            $table->Integer('requested_document_id');
            $table->string('training_id');
            $table->timestamps();

            $table->foreign('requested_document_id')
            ->references('id')
            ->on('requested_documents')
            ->onDelete('cascade');

            $table->foreign('training_id')
            ->references('id')
            ->on('trainings')
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
        Schema::dropIfExists('training_requesteddocuments');
    }
}
