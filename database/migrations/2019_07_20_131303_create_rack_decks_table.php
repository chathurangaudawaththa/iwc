<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRackDecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rack_decks', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->timestamps();
            
            $table->unsignedBigInteger('rack_id')->unsigned()->index()->nullable();
            $table->unsignedBigInteger('deck_id')->unsigned()->index()->nullable();
            
            $table->foreign('rack_id')->references('id')->on('racks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deck_id')->references('id')->on('decks')->onUpdate('cascade')->onDelete('cascade');
            //SETTING THE PRIMARY KEYS
            $table->primary(['rack_id','deck_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rack_decks');
    }
}
