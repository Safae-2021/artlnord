<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('title');
            $table->string('titlear');
            $table->string('labelone');
            $table->string('labelonear');
            $table->string('labeltwo');
            $table->string('labeltwoar');
            $table->string('labelthree');
            $table->string('labelthreear');
            $table->text('description');
            $table->text('descriptionar');
            $table->string('photo');
            $table->boolean('status');
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
        Schema::dropIfExists('rooms');
    }
}
