<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_id');
            $table->string('file_name');
            $table->string('file_uploaded_name');
            $table->string('music_size');
            // Rap - Rock
            $table->integer('music_sub_category');
            // For Actor or album
            $table->string('music_thumbnail');
            $table->integer('music_year');
            // For Music Album Table
            $table->string('music_album');
            $table->string('music_singer');
            $table->integer('music_duration');
            $table->string('movie_language');
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
        Schema::dropIfExists('musics_infos');
    }
}
