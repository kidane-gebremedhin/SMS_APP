<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateschoolteacheracceptancecapacityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_teacher_acceptance_capacity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roundId');
            $table->integer('requestTypeId');
            $table->integer('schoolId');
            $table->integer('educationalLevelId');
            //required only when request type is teacher
            $table->integer('subjectId')->nullable();
            $table->integer('quantity');
            $table->string('date');
            $table->text('remark')->nullable();
            $table->integer('createdByUserId');
            $table->integer('updatedByUserId')->nullable();
            $table->string('status')->default("active");
            $table->string('isDeleted')->default("false");
            $table->integer('deletedByUserId')->nullable();
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
        Schema::dropIfExists('school_teacher_acceptance_capacity');
    }
}
