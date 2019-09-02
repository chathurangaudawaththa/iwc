<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->boolean('is_visible')->default(1)->nullable();
            $table->double('amount')->default(0)->nullable();
            //$table->morphs('cashable');
            $table->string('cashable_type')->index()->nullable();
            $table->unsignedBigInteger('cashable_id')->index()->nullable();
            //$table->dateTime('date_create')->index()->nullable();
            $table->timestamp('date_create')->index()->nullable();
            //$table->text('description')->nullable();
            $table->unsignedBigInteger('transaction_type_id')->index()->unsigned()->nullable();
            
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types')->onUpdate('cascade');
            $table->index(['cashable_type', 'cashable_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_books');
    }
}
