<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnCCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('c_courses', function (Blueprint $table) {
            $table->string('price')->default(0)->change();
            $table->string('sale_price')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('c_courses', function (Blueprint $table) {
            $table->float('price')->default(0)->change();
            $table->float('sale_price')->default(0)->change();
        });
    }
}
