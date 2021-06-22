<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetransferresultsfromschooltoschoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_results_from_school_to_school', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roundId');
            $table->integer('requestId');
            $table->string('date');
            $table->integer('createdByUserId');
            $table->integer('updatedByUserId')->nullable();
            $table->string('isDeleted')->default("false");
            $table->integer('deletedByUserId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_results_from_school_to_school');
    }
}
