<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_resource', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roleId')->unsigned();//PIVIOT
            $table->integer('resourceId');
            $table->integer('show')->default(0);
            $table->integer('index')->default(0);
            $table->integer('store')->default(0);
            $table->integer('update')->default(0);
            $table->integer('destroy')->default(0);
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
        Schema::dropIfExists('role_resource');
    }
}
