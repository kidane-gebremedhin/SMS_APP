<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatekebellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*ቀበሌታት*/
        Schema::create('kebelles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tabyaId')->default('1');
            $table->string('weredaId')->default('1');
            $table->string('zoneId')->default('1');
            $table->string('regionId')->default('1');
            $table->string('name');
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
        Schema::dropIfExists('kebelles');
    }
}
