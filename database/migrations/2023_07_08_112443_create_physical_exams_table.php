<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('physical_exams', function (Blueprint $table) {
            $table->string('physicExam_id')->primary();
            
            $table->integer('patient_head');
            $table->integer('patient_forehead');
            $table->integer('patient_nose');
            $table->integer('patient_mouth');
            $table->integer('patient_neck');
            $table->integer('patient_rightEye');
            $table->integer('patient_leftEye');
            $table->integer('patient_rightEar');
            $table->integer('patient_leftEar');
            $table->integer('patient_nape');


            $table->integer('patient_rightBreast');
            $table->integer('patient_leftBreast');
            $table->integer('patient_rightLung');
            $table->integer('patient_leftLung');
            $table->integer('patient_rightShoulderBlade');
            $table->integer('patient_leftShoulderBlade');
            $table->integer('patient_stomach');
            $table->integer('patient_abdomen');
            $table->integer('patient_waist');

            $table->integer('patient_rightShoudler');
            $table->integer('patient_leftShoudler');
            $table->integer('patient_rightArm');
            $table->integer('patient_leftArm');
            $table->integer('patient_rightForearm');
            $table->integer('patient_leftForearm');
            $table->integer('patient_rightWrist');
            $table->integer('patient_leftWrist');
            $table->integer('patient_rightHand');
            $table->integer('patient_leftHand');


            $table->integer('patient_rightThigh');
            $table->integer('patient_leftThigh');
            $table->integer('patient_rightKnee');
            $table->integer('patient_leftKnee');
            $table->integer('patient_rightLeg');
            $table->integer('patient_leftLeg');
            $table->integer('patient_rightAnkle');
            $table->integer('patient_leftAnkle');
            $table->integer('patient_rightCalf');
            $table->integer('patient_leftCalf');
            $table->integer('patient_rightFoot');
            $table->integer('patient_leftFoot');














            $table->string('specify_patient_head');
            $table->string('specify_patient_forehead');
            $table->string('specify_patient_nose');
            $table->string('specify_patient_mouth');
            $table->string('specify_patient_neck');
            $table->string('specify_patient_rightEye');
            $table->string('specify_patient_leftEye');
            $table->string('specify_patient_rightEar');
            $table->string('specify_patient_leftEar');
            $table->string('specify_patient_nape');


            $table->string('specify_patient_rightBreast');
            $table->string('specify_patient_leftBreast');
            $table->string('specify_patient_rightLung');
            $table->string('specify_patient_leftLung');
            $table->string('specify_patient_rightShoulderBlade');
            $table->string('specify_patient_leftShoulderBlade');
            $table->string('specify_patient_stomach');
            $table->string('specify_patient_abdomen');
            $table->string('specify_patient_waist');

            $table->string('specify_patient_rightShoudler');
            $table->string('specify_patient_leftShoudler');
            $table->string('specify_patient_rightArm');
            $table->string('specify_patient_leftArm');
            $table->string('specify_patient_rightForearm');
            $table->string('specify_patient_leftForearm');
            $table->string('specify_patient_rightWrist');
            $table->string('specify_patient_leftWrist');
            $table->string('specify_patient_rightHand');
            $table->string('specify_patient_leftHand');


            $table->string('specify_patient_rightThigh');
            $table->string('specify_patient_leftThigh');
            $table->string('specify_patient_rightKnee');
            $table->string('specify_patient_leftKnee');
            $table->string('specify_patient_rightLeg');
            $table->string('specify_patient_leftLeg');
            $table->string('specify_patient_rightAnkle');
            $table->string('specify_patient_leftAnkle');
            $table->string('specify_patient_rightCalf');
            $table->string('specify_patient_leftCalf');
            $table->string('specify_patient_rightFoot');
            $table->string('specify_patient_leftFoot');



            $table->timestamps(); 

            $table->string('patient_id');

           
            $table->foreign('patient_id')->references('patient_id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_exams');
    }
};
