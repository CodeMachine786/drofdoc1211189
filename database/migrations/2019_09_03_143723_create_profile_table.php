<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(NULL);
            $table->text('file_content')->default(NULL);
            $table->string('phone_no', 100)->default(NULL);
            $table->string('email', 100)->default(NULL);
            $table->string('gender', 50)->default(NULL);
            $table->timestamp('dob');
            //$table->string('blood_group', 50)->default(NULL);
            $table->string('time_zone', 150)->default(NULL);
            $table->string('house_no', 50)->default(NULL);
            $table->string('street', 50)->default(NULL);
            $table->string('country', 100)->default(NULL);
            $table->string('city', 100)->default(NULL);
            $table->string('state', 100)->default(NULL);
            //$table->string('language', 50)->default(NULL);
            $table->string('pincode', 50)->default(NULL);
            $table->string('mobile_no', 100)->default(NULL);
            $table->string('specialist', 50)->default(NULL);
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
        Schema::dropIfExists('profile');
    }
}
