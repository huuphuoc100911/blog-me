<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('teacher_id');
            $table->integer('category_id');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->float('price')->default(0);
            $table->float('sale_price')->default(0);
            $table->string('code')->nullable();
            $table->float('duration')->default(0);
            $table->boolean('is_document')->default(0);
            $table->text('supports')->nullable();
            $table->boolean('status')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('c_courses');
    }
}
