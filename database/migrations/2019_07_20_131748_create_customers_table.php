<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->boolean('is_visible')->default(1)->nullable();
            $table->string('first_name')->index()->nullable();
            $table->string('last_name')->index()->nullable();
            $table->string('address')->index()->nullable();
            $table->string('phone')->index()->nullable();
            $table->string('nic')->index()->nullable();
            $table->string('code')->index()->nullable();
            $table->text('image_uri')->nullable();
            $table->text('image_uri_nic_front')->nullable();
            $table->text('image_uri_nic_back')->nullable();
            $table->unsignedBigInteger('user_type_id')->index()->unsigned()->nullable();
            
            $table->foreign('user_type_id')->references('id')->on('user_types')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
