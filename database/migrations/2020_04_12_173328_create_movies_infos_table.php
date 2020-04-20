<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_id');
            $table->string('file_name');
            $table->string('file_uploaded_name');
            $table->integer('movie_size');
            // Blue ray - Hd - 4K
            $table->string('movie_quality');
            // Drama - Comedy From Subcategories Table
            $table->integer('movie_sub_category');
            $table->string('movie_thumbnail');
            $table->integer('movie_year');
            $table->integer('movie_duration');
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
        Schema::dropIfExists('movies_infos');
    }
}
