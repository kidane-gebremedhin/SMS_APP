<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetransferrequestsfromschooltoschoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_requests_from_school_to_school', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacherId');
            $table->integer('roundId');
            $table->integer('requestTypeId');
            $table->integer('actualServiceYears');
            $table->integer('calculatedServiceYears');
            $table->text('transferReason')->nullable();

            //if married
            $table->string('isWillingToTransferAlone')->nullable();
            /*$table->string('hasProvidedMarriageInfo')->nullable();
            $table->string('marriageInfoAttachement')->nullable();*/

            /*//if disabled
            $table->string('hasProvidedDisabilityInfo')->nullable();
            $table->string('disabilityInfoAttachement')->nullable();*/

            $table->string('isEthinic')->default("false");

            $table->integer('fromSchoolId');
            $table->integer('toSchoolId');
            $table->string('date');
            $table->text('remark')->nullable();
            $table->string('isApproved')->default("false");
            $table->integer('approvedByUserId')->nullable();

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
        Schema::dropIfExists('transfer_requests_from_school_to_school');
    }
}
