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
            $table->string('patient_head');
            $table->string('patient_forehead');
            $table->string('patient_nose');
            $table->string('patient_mouth');
            $table->string('patient_neck');
            $table->string('patient_rightEye');
            $table->string('patient_leftEye');
            $table->string('patient_rightEar');
            $table->string('patient_leftEar');
            $table->string('patient_nape');


            $table->string('patient_rightBreast');
            $table->string('patient_leftBreast');
            $table->string('patient_rightLung');
            $table->string('patient_leftLung');
            $table->string('patient_rightShoulderBlade');
            $table->string('patient_leftShoulderBlade');
            $table->string('patient_stomach');
            $table->string('patient_abdomen');
            $table->string('patient_waist');

            $table->string('patient_rightShoudler');
            $table->string('patient_leftShoudler');
            $table->string('patient_rightArm');
            $table->string('patient_leftArm');
            $table->string('patient_rightForearm');
            $table->string('patient_leftForearm');
            $table->string('patient_rightWrist');
            $table->string('patient_leftWrist');
            $table->string('patient_rightHand');
            $table->string('patient_leftHand');


            $table->string('patient_rightThigh');
            $table->string('patient_leftThigh');
            $table->string('patient_rightKnee');
            $table->string('patient_leftKnee');
            $table->string('patient_rightLeg');
            $table->string('patient_leftLeg');
            $table->string('patient_rightAnkle');
            $table->string('patient_leftAnkle');
            $table->string('patient_rightCalf');
            $table->string('patient_leftCalf');
            $table->string('patient_rightFoot');
            $table->string('patient_leftFoot');




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
