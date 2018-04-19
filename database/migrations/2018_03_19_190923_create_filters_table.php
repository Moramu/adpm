<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('item_number');
        $table->string('name');
        $table->double('list_price',8,2);
        $table->double('extended_price',8,2);
        $table->integer('co_stock');
        $table->string('provider');
        $table->double('rtl_price',8,2);
        $table->double('whl_price',8,2);
        $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('filters');
    }
}
