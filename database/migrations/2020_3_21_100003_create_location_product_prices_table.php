<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatelocationproductpricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_product_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roundId');
            $table->integer('locationId');
            $table->integer('productId');
            $table->double('price', 50, 2);
            $table->integer('measurmentTypeId');
            $table->integer('createdByUserId');
            $table->string('status')->default("active");
            $table->string('isDeleted')->default("false");
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
        Schema::dropIfExists('location_product_prices');
    }
}

