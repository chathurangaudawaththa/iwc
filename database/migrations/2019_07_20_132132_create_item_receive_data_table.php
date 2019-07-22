<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemReceiveDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_receive_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->boolean('is_visible')->default(1)->nullable();
            //$table->text('description')()->nullable();
            $table->unsignedBigInteger('item_receive_id')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('stock_id')->index()->unsigned()->nullable();
            $table->decimal('unit_price')->default(0)->nullable();
            
            $table->foreign('item_receive_id')->references('id')->on('item_receives')->onUpdate('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_receive_data');
    }
}
