<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateroledocumentpermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_document_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roleId');
            $table->integer('documentId');
            $table->integer('show')->default(0);
            $table->integer('share')->default(0);
            $table->integer('update')->default(0);
            $table->integer('destroy')->default(0);
            $table->integer('download')->default(0);
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
        Schema::dropIfExists('role_document_permissions');
    }
}
