<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetabyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*ቀበሌታት*/
        Schema::create('tabyas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->default('1');
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
        Schema::dropIfExists('tabyas');
    }
}
