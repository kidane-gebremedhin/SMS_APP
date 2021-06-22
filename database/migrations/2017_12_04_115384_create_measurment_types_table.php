<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatemeasurmenttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*ከተማታት*/
        Schema::create('measurment_types', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::dropIfExists('measurment_types');
    }
}
