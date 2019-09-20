<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('qualification','250')->default(Null);
            $table->integer('experience')->unsigned();
            $table->text('logo')->default(Null);
            $table->string('name', '50')->default(Null);
            $table->text('description')->default(Null);
            $table->text('skill')->default(Null);
            $table->text('timing')->default(Null);
            $table->integer('fees')->default(Null);
            $table->text('images')->default(Null);
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
        Schema::dropIfExists('personal_info');
    }
}
