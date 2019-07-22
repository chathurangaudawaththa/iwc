<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemIssueDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_issue_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->boolean('is_visible')->default(1)->nullable();
            //$table->text('description')()->nullable();
            $table->unsignedBigInteger('item_issue_id')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('stock_id')->index()->unsigned()->nullable();
            $table->decimal('unit_price')->default(0)->nullable();
            
            $table->foreign('item_issue_id')->references('id')->on('item_issues')->onUpdate('cascade');
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
        Schema::dropIfExists('item_issue_data');
    }
}