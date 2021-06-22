<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateschoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('regionId')->default('1');
            $table->integer('zoneId')->default('1');
            $table->integer('weredaId')->default('1');
            $table->string('name')->unique(); 
            $table->string('isEthinic')->default("false");
            $table->string('principal')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('email')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
