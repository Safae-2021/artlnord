<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequireddocumentStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requireddocument_student', function (Blueprint $table) {
            $table->id();
            $table->Integer('required_document_id');
            $table->string('student_id',50);
            $table->string('training_id',50);
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('required_document_id')
            ->references('id')
            ->on('required_document')
            ->onDelete('cascade');

            $table->foreign('student_id')
            ->references('id')
            ->on('students')
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
        Schema::dropIfExists('requireddocument_student');
    }
}
