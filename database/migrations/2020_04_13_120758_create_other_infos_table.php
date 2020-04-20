<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('file_id');
            $table->string('file_name');
            $table->string('file_uploaded_name');
            $table->integer('file_size');
            $table->text('file_description');
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
        Schema::dropIfExists('other_infos');
    }
}
