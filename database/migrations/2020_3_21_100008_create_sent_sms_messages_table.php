<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesentsmsmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_sms_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoryId');
            $table->integer('recipientId');
            $table->text('message');
            $table->string('date');
            $table->integer('createdByUserId');
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
        Schema::dropIfExists('sent_sms_messages');
    }
}

