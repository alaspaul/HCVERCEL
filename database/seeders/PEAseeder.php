<?php

namespace Database\Seeders;

use App\Models\PhysicalExam_Attributes;
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
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA1', 
                'PEA_name' => 'patient_forehead',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA2', 
                'PEA_name' => 'patient_nose',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA3', 
                'PEA_name' => 'patient_mouth',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA4', 
                'PEA_name' => 'patient_neck',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA5', 
                'PEA_name' => 'patient_rightEye',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA6', 
                'PEA_name' => 'patient_leftEye',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA7', 
                'PEA_name' => 'patient_rightEar',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA8', 
                'PEA_name' => 'patient_leftEar',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA9', 
                'PEA_name' => 'patient_nape',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA10', 
                'PEA_name' => 'specify_patient_head',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA11', 
                'PEA_name' => 'specify_patient_forehead',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA12', 
                'PEA_name' => 'specify_patient_nose',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA13', 
                'PEA_name' => 'specify_patient_mouth',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA14', 
                'PEA_name' => 'specify_patient_neck',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA15', 
                'PEA_name' => 'specify_patient_rightEye',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA16', 
                'PEA_name' => 'specify_patient_leftEye',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA17', 
                'PEA_name' => 'specify_patient_rightEar',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA18', 
                'PEA_name' => 'specify_patient_leftEar',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE0PEA19', 
                'PEA_name' => 'specify_patient_nape',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE0',
                'created_at' => now(), 'updated_at' => now(),
            ],
            





            [
                'PEA_id' => 'PE1PEA0', 
                'PEA_name' => 'patient_rightBreast',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA1', 
                'PEA_name' => 'patient_leftBreast',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA2', 
                'PEA_name' => 'patient_rightLung',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA3', 
                'PEA_name' => 'patient_leftLung',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA4', 
                'PEA_name' => 'patient_rightShoulderBlade',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA5', 
                'PEA_name' => 'patient_leftShoulderBlade',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA6', 
                'PEA_name' => 'patient_stomach',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA7', 
                'PEA_name' => 'patient_abdomen',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA8', 
                'PEA_name' => 'patient_waist',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA9', 
                'PEA_name' => 'specify_patient_rightBreast',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA10', 
                'PEA_name' => 'specify_patient_leftBreast',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA11', 
                'PEA_name' => 'specify_patient_rightLung',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA12', 
                'PEA_name' => 'specify_patient_leftLung',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA13', 
                'PEA_name' => 'specify_patient_rightShoulderBlade',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA14', 
                'PEA_name' => 'specify_patient_leftShoulderBlade',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA15', 
                'PEA_name' => 'specify_patient_stomach',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA16', 
                'PEA_name' => 'specify_patient_abdomen',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE1PEA17', 
                'PEA_name' => 'specify_patient_waist',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE1',
                'created_at' => now(), 'updated_at' => now(),
            ],







            [
                'PEA_id' => 'PE2PEA0', 
                'PEA_name' => 'patient_rightThigh',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA1', 
                'PEA_name' => 'patient_leftThigh',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA2', 
                'PEA_name' => 'patient_rightKnee',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA3', 
                'PEA_name' => 'patient_leftKnee',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA4', 
                'PEA_name' => 'patient_rightLeg',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA5', 
                'PEA_name' => 'patient_leftLeg',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA6', 
                'PEA_name' => 'patient_rightAnkle',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA7', 
                'PEA_name' => 'patient_leftAnkle',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA8', 
                'PEA_name' => 'patient_rightCalf',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA9', 
                'PEA_name' => 'patient_leftCalf',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA10', 
                'PEA_name' => 'patient_rightFoot',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA11', 
                'PEA_name' => 'patient_leftFoot',  
                'PEA_dataType' => 'integer', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA12', 
                'PEA_name' => 'specify_patient_rightThigh',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA13', 
                'PEA_name' => 'specify_patient_leftThigh',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA14', 
                'PEA_name' => 'specify_patient_rightKnee',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA15', 
                'PEA_name' => 'specify_patient_leftKnee',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA16', 
                'PEA_name' => 'specify_patient_rightLeg',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA17', 
                'PEA_name' => 'specify_patient_leftLeg',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA18', 
                'PEA_name' => 'specify_patient_rightAnkle',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA19', 
                'PEA_name' => 'specify_patient_leftAnkle',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA20', 
                'PEA_name' => 'specify_patient_rightCalf',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA21', 
                'PEA_name' => 'specify_patient_leftCalf',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA22', 
                'PEA_name' => 'specify_patient_rightFoot',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE2PEA23', 
                'PEA_name' => 'specify_patient_leftFoot',  
                'PEA_dataType' => 'string', 
                
                'physicalExam_id' => 'PE2',
                'created_at' => now(), 'updated_at' => now(),
            ],





           

            [
                'PEA_id' => 'PE3PEA0', 
                'PEA_name' => 'patient_rightShoudler', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA1', 
                'PEA_name' => 'patient_leftShoudler', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA2', 
                'PEA_name' => 'patient_rightArm', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA3', 
                'PEA_name' => 'patient_leftArm', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA4', 
                'PEA_name' => 'patient_rightForearm', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA5', 
                'PEA_name' => 'patient_leftForearm', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA6', 
                'PEA_name' => 'patient_rightWrist', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA7', 
                'PEA_name' => 'patient_leftWrist', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA8', 
                'PEA_name' => 'patient_rightHand', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA9', 
                'PEA_name' => 'patient_leftHand', 
                'PEA_dataType' => 'integer', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],

            [
                'PEA_id' => 'PE3PEA10', 
                'PEA_name' => 'specify_patient_rightShoudler', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA11', 
                'PEA_name' => 'specify_patient_leftShoudler', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA12', 
                'PEA_name' => 'specify_patient_rightArm', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA13', 
                'PEA_name' => 'specify_patient_leftArm', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA14', 
                'PEA_name' => 'specify_patient_rightForearm', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA15', 
                'PEA_name' => 'specify_patient_leftForearm', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA16', 
                'PEA_name' => 'specify_patient_rightWrist', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA17', 
                'PEA_name' => 'specify_patient_leftWrist', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA18', 
                'PEA_name' => 'specify_patient_rightHand', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'PEA_id' => 'PE3PEA19', 
                'PEA_name' => 'specify_patient_leftHand', 
                'PEA_dataType' => 'string', 

                'physicalExam_id' => 'PE3',
                'created_at' => now(), 'updated_at' => now(),
            ],







           
    
       ];
    
       PhysicalExam_Attributes::insert($PEA);
    
        }
    }

