<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetransfercategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shortCode')->unique(); 
            $table->string('name')->unique(); 
            $table->integer('level')->default(1); 
            $table->integer('priority')->default(1); 
            //$table->integer('weight')->default(0); 
            //$table->string('hasVetoPower')->nullable();
            //$table->string('isPrimary')->default("false");
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
        Schema::dropIfExists('transfer_categories');
    }
}
