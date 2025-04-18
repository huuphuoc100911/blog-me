<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('staff_id');
            $table->bigInteger('category_id');
            $table->string('title')->nullable();
            $table->string('url_image')->nullable();
            $table->text('description')->nullable();
            $table->integer('priority')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_favorite')->default(1);
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
        Schema::dropIfExists('blogs');
    }
}
