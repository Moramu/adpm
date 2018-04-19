<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_params', function (Blueprint $table) {
            $table->increments('id');
            $table->string('line');
	    $table->double('ph',8,2);
	    $table->integer('nitrite');
	    $table->integer('nitrate');
	    $table->double('phosphate',8,2);
	    $table->integer('kh')->nullable();
	    $table->double('salt',8,2)->nullable();
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
        Schema::dropIfExists('water_params');
    }
}
