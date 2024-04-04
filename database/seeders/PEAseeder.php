<?php

namespace Database\Seeders;

use App\Models\physicalExam_Attributes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PEAseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PEA = [   

            [
                'PEA_id' => 'PE0PEA0', 
                'PEA_name' => 'patient_head', 
                'PEA_returnName' => "Head",
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA1', 
                'PEA_name' => 'patient_forehead',
                'PEA_returnName' => "Forehead",  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA2', 
                'PEA_name' => 'patient_nose',  
                'PEA_returnName' => "Nose",
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA3', 
                'PEA_name' => 'patient_mouth', 
                'PEA_returnName' => "Mouth", 
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA4', 
                'PEA_name' => 'patient_neck',  
                'PEA_returnName' => "Neck",
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA5', 
                'PEA_name' => 'patient_rightEye',  
                'PEA_returnName' => "Right Eye",
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA6', 
                'PEA_name' => 'patient_leftEye',  
                'PEA_returnName' => "Left Eye",
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA7', 
                'PEA_name' => 'patient_rightEar',  
                'PEA_returnName' => "RightEar",
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA8', 
                'PEA_name' => 'patient_leftEar',  
                'PEA_returnName' => "Left Ear",
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA9', 
                'PEA_name' => 'patient_nape',  
                'PEA_returnName' => "Nape",
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA10', 
                'PEA_name' => 'specify_patient_head',  
                'PEA_returnName' => "Specify Head",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA11', 
                'PEA_name' => 'specify_patient_forehead',  
                'PEA_returnName' => "Specify Forehead",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA12', 
                'PEA_name' => 'specify_patient_nose',  
                'PEA_returnName' => "Specify Nose",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA13', 
                'PEA_name' => 'specify_patient_mouth',  
                'PEA_returnName' => "Specify Mouth",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA14', 
                'PEA_name' => 'specify_patient_neck',  
                'PEA_returnName' => "Specify Neck",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA15', 
                'PEA_name' => 'specify_patient_rightEye',  
                'PEA_returnName' => "Specify Right Eye",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA16', 
                'PEA_name' => 'specify_patient_leftEye',  
                'PEA_returnName' => "Specify Left Eye",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA17', 
                'PEA_name' => 'specify_patient_rightEar',  
                'PEA_returnName' => "Specify Right Ear",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA18', 
                'PEA_name' => 'specify_patient_leftEar',  
                'PEA_returnName' => "Specify Left Eye",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA19', 
                'PEA_name' => 'specify_patient_nape',  
                'PEA_returnName' => "Specify Nape",
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            





            
            [
                'PEA_id' => 'PE1PEA0', 
                'PEA_name' => 'patient_rightBreast',  
                'PEA_returnName' => "Patient Right Breast",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA1', 
                'PEA_name' => 'patient_leftBreast',  
                'PEA_returnName' => "Patient Left Breast",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA2', 
                'PEA_name' => 'patient_rightLung',  
                'PEA_returnName' => "Patient Right Lung",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA3', 
                'PEA_name' => 'patient_leftLung',  
                'PEA_returnName' => "Patient Left Lung",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA4', 
                'PEA_name' => 'patient_rightShoulderBlade',  
                'PEA_returnName' => "Patient Right Shoulder Blade",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA5', 
                'PEA_name' => 'patient_leftShoulderBlade',  
                'PEA_returnName' => "Patient Left Shoulder Blade",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA6', 
                'PEA_name' => 'patient_stomach',  
                'PEA_returnName' => "Patient Stomach",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA7', 
                'PEA_name' => 'patient_abdomen',  
                'PEA_returnName' => "Patient Abdomen",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA8', 
                'PEA_name' => 'patient_waist',  
                'PEA_returnName' => "Patient Waist",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA9', 
                'PEA_name' => 'specify_patient_rightBreast',  
                'PEA_returnName' => "Specify Patient Right Breast",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA10', 
                'PEA_name' => 'specify_patient_leftBreast',  
                'PEA_returnName' => "Specify Patient Left Breast",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA11', 
                'PEA_name' => 'specify_patient_rightLung',  
                'PEA_returnName' => "Specify Patient Right Lung",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA12', 
                'PEA_name' => 'specify_patient_leftLung',  
                'PEA_returnName' => "Specify Patient Left Lung",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA13', 
                'PEA_name' => 'specify_patient_rightShoulderBlade',  
                'PEA_returnName' => "Specify Patient Right Shoulder Blade",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA14', 
                'PEA_name' => 'specify_patient_leftShoulderBlade',  
                'PEA_returnName' => "Specify Patient Left Shoulder Blade",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA15', 
                'PEA_name' => 'specify_patient_stomach',  
                'PEA_returnName' => "Specify Patient Stomach",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA16', 
                'PEA_name' => 'specify_patient_abdomen',  
                'PEA_returnName' => "Specify Patient Abdomen",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA17', 
                'PEA_name' => 'specify_patient_waist',  
                'PEA_returnName' => "Specify Patient Waist",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            







            
            [
                'PEA_id' => 'PE2PEA0', 
                'PEA_name' => 'patient_rightThigh',  
                'PEA_returnName' => "Patient Right Thigh",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA1', 
                'PEA_name' => 'patient_leftThigh',  
                'PEA_returnName' => "Patient Left Thigh",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA2', 
                'PEA_name' => 'patient_rightKnee',  
                'PEA_returnName' => "Patient Right Knee",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA3', 
                'PEA_name' => 'patient_leftKnee',  
                'PEA_returnName' => "Patient Left Knee",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA4', 
                'PEA_name' => 'patient_rightLeg',  
                'PEA_returnName' => "Patient Right Leg",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA5', 
                'PEA_name' => 'patient_leftLeg',  
                'PEA_returnName' => "Patient Left Leg",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA6', 
                'PEA_name' => 'patient_rightAnkle',  
                'PEA_returnName' => "Patient Right Ankle",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA7', 
                'PEA_name' => 'patient_leftAnkle',  
                'PEA_returnName' => "Patient Left Ankle",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA8', 
                'PEA_name' => 'patient_rightCalf',  
                'PEA_returnName' => "Patient Right Calf",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA9', 
                'PEA_name' => 'patient_leftCalf',  
                'PEA_returnName' => "Patient Left Calf",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA10', 
                'PEA_name' => 'patient_rightFoot',  
                'PEA_returnName' => "Patient Right Foot",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA11', 
                'PEA_name' => 'patient_leftFoot',  
                'PEA_returnName' => "Patient Left Foot",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA12', 
                'PEA_name' => 'specify_patient_rightThigh',  
                'PEA_returnName' => "Specify Patient Right Thigh",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA13', 
                'PEA_name' => 'specify_patient_leftThigh',  
                'PEA_returnName' => "Specify Patient Left Thigh",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA14', 
                'PEA_name' => 'specify_patient_rightKnee',  
                'PEA_returnName' => "Specify Patient Right Knee",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA15', 
                'PEA_name' => 'specify_patient_leftKnee',  
                'PEA_returnName' => "Specify Patient Left Knee",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA16', 
                'PEA_name' => 'specify_patient_rightLeg',  
                'PEA_returnName' => "Specify Patient Right Leg",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA17', 
                'PEA_name' => 'specify_patient_leftLeg',  
                'PEA_returnName' => "Specify Patient Left Leg",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA18', 
                'PEA_name' => 'specify_patient_rightAnkle',  
                'PEA_returnName' => "Specify Patient Right Ankle",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA19', 
                'PEA_name' => 'specify_patient_leftAnkle',  
                'PEA_returnName' => "Specify Patient Left Ankle",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA20', 
                'PEA_name' => 'specify_patient_rightCalf',  
                'PEA_returnName' => "Specify Patient Right Calf",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA21', 
                'PEA_name' => 'specify_patient_leftCalf',  
                'PEA_returnName' => "Specify Patient Left Calf",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA22', 
                'PEA_name' => 'specify_patient_rightFoot',  
                'PEA_returnName' => "Specify Patient Right Foot",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA23', 
                'PEA_name' => 'specify_patient_leftFoot',  
                'PEA_returnName' => "Specify Patient Left Foot",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
        
            





           

            [
                'PEA_id' => 'PE3PEA0', 
                'PEA_name' => 'patient_rightShoudler', 
                'PEA_returnName' => "Patient Right Shoulder",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA1', 
                'PEA_name' => 'patient_leftShoudler', 
                'PEA_returnName' => "Patient Left Shoulder",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA2', 
                'PEA_name' => 'patient_rightArm', 
                'PEA_returnName' => "Patient Right Arm",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA3', 
                'PEA_name' => 'patient_leftArm', 
                'PEA_returnName' => "Patient Left Arm",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA4', 
                'PEA_name' => 'patient_rightForearm', 
                'PEA_returnName' => "Patient Right Forearm",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA5', 
                'PEA_name' => 'patient_leftForearm', 
                'PEA_returnName' => "Patient Left Forearm",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA6', 
                'PEA_name' => 'patient_rightWrist', 
                'PEA_returnName' => "Patient Right Wrist",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA7', 
                'PEA_name' => 'patient_leftWrist', 
                'PEA_returnName' => "Patient Left Wrist",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA8', 
                'PEA_name' => 'patient_rightHand', 
                'PEA_returnName' => "Patient Right Hand",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA9', 
                'PEA_name' => 'patient_leftHand', 
                'PEA_returnName' => "Patient Left Hand",
                'PEA_dataType' => 'integer', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA10', 
                'PEA_name' => 'specify_patient_rightShoudler', 
                'PEA_returnName' => "Specify Patient Right Shoulder",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA11', 
                'PEA_name' => 'specify_patient_leftShoudler', 
                'PEA_returnName' => "Specify Patient Left Shoulder",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA12', 
                'PEA_name' => 'specify_patient_rightArm', 
                'PEA_returnName' => "Specify Patient Right Arm",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA13', 
                'PEA_name' => 'specify_patient_leftArm', 
                'PEA_returnName' => "Specify Patient Left Arm",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA14', 
                'PEA_name' => 'specify_patient_rightForearm', 
                'PEA_returnName' => "Specify Patient Right Forearm",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA15', 
                'PEA_name' => 'specify_patient_leftForearm', 
                'PEA_returnName' => "Specify Patient Left Forearm",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA16', 
                'PEA_name' => 'specify_patient_rightWrist', 
                'PEA_returnName' => "Specify Patient Right Wrist",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA17', 
                'PEA_name' => 'specify_patient_leftWrist', 
                'PEA_returnName' => "Specify Patient Left Wrist",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA18', 
                'PEA_name' => 'specify_patient_rightHand', 
                'PEA_returnName' => "Specify Patient Right Hand",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA19', 
                'PEA_name' => 'specify_patient_leftHand', 
                'PEA_returnName' => "Specify Patient Left Hand",
                'PEA_dataType' => 'string', 
                'physicalExam_id' => 'PE3',
                'created_at' => now(), 
                'updated_at' => now(),
            ],







           
    
       ];
    
       physicalExam_Attributes::insert($PEA);
    
        }
    }

