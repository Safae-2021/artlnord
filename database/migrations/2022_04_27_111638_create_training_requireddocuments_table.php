<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingRequireddocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_requireddocuments', function (Blueprint $table) {
            $table->id();
            $table->Integer('required_document_id');
            $table->string('training_id');
            $table->timestamps();

            $table->foreign('required_document_id')
            ->references('id')
            ->on('require_documents')
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
        Schema::dropIfExists('training_requireddocuments');
    }
}
