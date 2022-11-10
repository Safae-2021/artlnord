<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id',50);
            $table->string('arabic_name');
            $table->string('n_professionnelle_carte')->nullable();
            $table->string('n_permis');
            $table->bigInteger('categorie_permis_id');
            $table->date('date_obtention');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->boolean('status');
            $table->softDeletes()->default(null);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('categorie_permis_id')
            ->references('id')
            ->on('categorie_permis')
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
        Schema::dropIfExists('students');
    }
}
