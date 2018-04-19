<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reefs', function (Blueprint $table) {
            $table->increments('id');
	    $table->string('name');
	    $table->integer('material_id');
	    $table->double('m_quantity',8,2);
	    $table->double('m_price',8,2);
	    $table->double('m_price_rtl',8,2);
	    $table->double('m_price_whl',8,2);
	    $table->text('coral_id');
	    $table->text('c_quantity');
	    $table->integer('c_sum_quantity');
	    $table->double('c_sum_rtl',8,2);
            $table->double('c_sum_whl',8,2);
	    $table->double('reef_sum_rtl',8,2);
	    $table->double('reef_sum_whl',8,2);
	    $table->string('username');
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
        Schema::dropIfExists('reefs');
    }
}
