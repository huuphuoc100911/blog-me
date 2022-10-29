<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_staffs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->string('name');
            $table->string('url_image')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('link_facebook')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('info_staffs');
    }
}
