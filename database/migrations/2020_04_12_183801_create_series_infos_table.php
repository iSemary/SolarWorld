<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_id');
            $table->string('file_name');
            $table->string('file_uploaded_name');
            $table->integer('series_season');
            $table->string('series_size');
            // Blue ray - Hd - 4K
            $table->string('series_quality');
            // Drama - Comedy From Subcategories Table
            $table->integer('series_sub_category');
            $table->string('series_thumbnail');
            $table->integer('series_year');
            $table->integer('series_duration');
            $table->string('series_language');
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
        Schema::dropIfExists('series_infos');
    }
}
