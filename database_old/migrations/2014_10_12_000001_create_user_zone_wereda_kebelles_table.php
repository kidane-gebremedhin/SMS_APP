<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateuserzoneweredakebellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_zone_wereda_kebelles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->string('regionId')->default('1');
            $table->string('zoneId');
            $table->string('weredaId');
            $table->string('tabyaId');
            $table->string('kebelleId')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('user_zone_wereda_kebelles');
    }
}
