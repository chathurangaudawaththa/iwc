<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->rememberToken();
            $table->timestamps();
            
            $table->boolean('is_visible')->default(1)->nullable();
            $table->string('first_name')->index()->nullable();
            $table->string('last_name')->index()->nullable();
            $table->string('address')->index()->nullable();
            $table->string('phone')->index()->nullable();
            $table->string('nic')->index()->nullable();
            $table->string('code')->index()->nullable();
            $table->string('username')->unique()->index()->nullable();
            $table->string('password')->index()->nullable();
            $table->text('image_uri')->nullable();
            $table->text('image_uri_nic_front')->nullable();
            $table->text('image_uri_nic_back')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
