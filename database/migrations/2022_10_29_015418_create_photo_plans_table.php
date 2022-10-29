<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->string('name');
            $table->string('url_image')->nullable();
            $table->text('description')->nullable();
            $table->integer('time_photo')->nullable();
            $table->integer('time_delivery')->nullable();
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
        Schema::dropIfExists('photo_plans');
    }
}
