<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*ከተማታት*/
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('regionId')->default('1');
            $table->string('name')->unique(); 
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('zones');
    }
}
