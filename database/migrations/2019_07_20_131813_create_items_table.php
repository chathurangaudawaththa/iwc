<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->boolean('is_visible')->default(1)->nullable();
            $table->string('name')->index()->nullable();
            $table->string('code')->index()->nullable();
            $table->decimal('quantity_low')->default(0)->nullable();
            $table->boolean('is_rentable')->default(0)->nullable();
            $table->decimal('unit_price')->default(0)->nullable();
            $table->text('image_uri')->nullable();
            $table->unsignedBigInteger('measuring_unit_id')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('rack_id')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('deck_id')->index()->unsigned()->nullable();
            
            $table->foreign('measuring_unit_id')->references('id')->on('measuring_units')->onUpdate('cascade');
            $table->foreign('rack_id')->references('id')->on('racks')->onUpdate('cascade');
            $table->foreign('deck_id')->references('id')->on('decks')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
