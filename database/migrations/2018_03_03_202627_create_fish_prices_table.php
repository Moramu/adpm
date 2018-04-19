<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fish_id');
            $table->string('fish_size_id');
            $table->double('price',8,2);
            $table->double('rtl_price',8,2);
            $table->double('wholesale_price',8,2);
            $table->double('special_price',8,2)->nullable();
	    $table->integer('quantity');
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
        Schema::dropIfExists('fish_prices');
    }
}
