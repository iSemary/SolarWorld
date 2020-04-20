<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_id');
            $table->string('file_name');
            $table->string('file_uploaded_name');
            $table->string('program_size');
            // Graphics - Art - Media player From Subcategories Table
            $table->integer('program_sub_category');
            $table->string('program_thumbnail');
            $table->integer('program_year');
            $table->string('program_version');
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
        Schema::dropIfExists('programs_infos');
    }
}
