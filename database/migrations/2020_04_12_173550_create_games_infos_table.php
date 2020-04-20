<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_id');
            $table->string('file_name');
            $table->string('file_uploaded_name');
            $table->string('game_size');
            // Action - Shooting - Arcade From Subcategories Table
            $table->integer('game_sub_category');
            $table->string('game_thumbnail');
            $table->integer('game_year');
            $table->string('game_version');

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
        Schema::dropIfExists('games_infos');
    }
}
