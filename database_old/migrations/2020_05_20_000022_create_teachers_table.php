<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('middleName')->nullable();
            $table->string('gender');
            $table->integer('recruitmentYear');
//            $table->integer('actualServiceYears');
//            $table->integer('calculatedServiceYears');
//            $table->text('transferReason')->nullable();

            $table->string('maritalStatus')->default("false");
            //if married
            $table->integer('merriagePartnerId')->nullable();
            $table->integer('merriagePartnerWeredaId')->nullable();
            $table->integer('merriagePartnerSchoolId')->nullable();
            //$table->string('isWillingToTransferAlone')->nullable();
            $table->string('hasProvidedMarriageInfo')->nullable();
            $table->string('marriageInfoAttachement')->nullable();

            $table->string('hasHealthIssue')->default("false");
            $table->string('hasProvidedHealthIssueInfo')->nullable();
            $table->string('healthIssueInfoAttachement')->nullable();

            $table->string('isDisabled')->default("false");
            $table->string('isDisabledAttachement')->nullable();
            
            $table->string('isAppointed')->default("false");
            $table->string('hasProvidedAppointmentInfo')->nullable();
            $table->string('appointmentInfoAttachement')->nullable();


            //$table->string('isEthinic')->default("false");

            $table->integer('educationalLevelId');
            // if educational leader
            $table->integer('regularJobId')->nullable();
            //if teacher
            $table->integer('graduatedSubjectId')->nullable();
            $table->integer('teachingSubjectId')->nullable();

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
        Schema::dropIfExists('teachers');
    }
}
