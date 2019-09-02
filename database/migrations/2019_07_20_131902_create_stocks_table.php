<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->boolean('is_visible')->default(1)->nullable();
            $table->double('quantity')->default(0)->nullable();
            //$table->dateTime('date_create')->index()->nullable();
            $table->timestamp('date_create')->index()->nullable();
            //$table->text('description')->nullable();
            //$table->morphs('stockable');
            $table->string('stockable_type')->index()->nullable();
            $table->unsignedBigInteger('stockable_id')->index()->nullable();
            $table->unsignedBigInteger('item_id')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('measuring_unit_id')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('transaction_type_id')->index()->unsigned()->nullable();
            
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade');
            $table->foreign('measuring_unit_id')->references('id')->on('measuring_units')->onUpdate('cascade');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types')->onUpdate('cascade');
            $table->index(['stockable_type', 'stockable_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
