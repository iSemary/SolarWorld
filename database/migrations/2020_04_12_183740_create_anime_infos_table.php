<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_id');
            $table->string('file_name');
            $table->string('file_uploaded_name');
            $table->integer('anime_season');
            $table->string('anime_size');
            // Blue ray - Hd - 4K
            $table->string('anime_quality');
            // Drama - Comedy From Subcategories Table
            $table->integer('anime_sub_category');
            $table->string('anime_thumbnail');
            $table->integer('anime_year');
            $table->integer('anime_duration');
            $table->string('anime_language');
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
        Schema::dropIfExists('anime_infos');
    }
}
