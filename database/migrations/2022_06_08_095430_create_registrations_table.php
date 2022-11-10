<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->Integer('group_id')->nullable();
            $table->string('student_id', 50);
            $table->string('training_id', 50);
            $table->timestamp('date_registration')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->timestamps();

            $table->foreign('group_id')
            ->references('id')
            ->on('groups')
            ->onDelete('cascade');

            $table->foreign('student_id')
            ->references('id')
            ->on('students')
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
        Schema::dropIfExists('registrations');
    }
}
