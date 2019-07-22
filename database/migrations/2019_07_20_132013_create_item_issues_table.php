<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->boolean('is_visible')->default(1)->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            //$table->dateTime('date_create')->index()->nullable();
            $table->timestamp('date_create')->index()->nullable();
            $table->timestamp('date_receive')->index()->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id_create')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('customer_id_create')->index()->unsigned()->nullable();
            $table->unsignedBigInteger('transaction_type_id')->index()->unsigned()->nullable();
            
            $table->foreign('user_id_create')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('customer_id_create')->references('id')->on('customers')->onUpdate('cascade');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_issues');
    }
}
