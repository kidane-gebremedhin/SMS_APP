<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
        $table->increments('id');
        $table->float('lengthOfSingleResultInMilliSeconds')->default(1000);
        $table->integer('paginationSize')->default(10);
        $table->integer('reportGenerationDate')->default(1);
        $table->integer('reportIntervalInMonths')->default(6);
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
        Schema::dropIfExists('settings');
    }
}
