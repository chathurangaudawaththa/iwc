<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            
            $table->boolean('is_visible')->index()->default(null)->nullable();
            $table->boolean('is_active')->index()->default(null)->nullable();
            $table->string('slug')->index()->unique()->nullable();
            $table->string('name')->index()->unique();
            $table->text('icon_uri')->default(null)->nullable();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
