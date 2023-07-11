<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class physicalExam extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'physicExam_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'physicExam_id',
        'patient_head',
        'patient_forehead',
        'patient_nose',
        'patient_mouth', 
        'patient_neck',
        'patient_rightEye',
        'patient_leftEye',
        'patient_rightEar',
        'patient_leftEar',
        'patient_nape',


        'patient_rightBreast',
        'patient_leftBreast',
        'patient_rightLung',
        'patient_leftLung',
        'patient_rightShoulderBlade',
        'patient_leftShoulderBlade',
        'patient_stomach',
        'patient_abdomen',
        'patient_waist',

        'patient_rightShoudler',
        'patient_leftShoudler',
        'patient_rightArm',
        'patient_leftArm',
        'patient_rightForearm',
        'patient_leftForearm',
        'patient_rightWrist',
        'patient_leftWrist',
        'patient_rightHand',
        'patient_leftHand',


        'patient_rightThigh',
        'patient_leftThigh',
        'patient_rightKnee',
        'patient_leftKnee',
        'patient_rightLeg',
        'patient_leftLeg',
        'patient_rightAnkle',
        'patient_leftAnkle',
        'patient_rightCalf',
        'patient_leftCalf',
        'patient_rightFoot',
        'patient_leftFoot',

        'patient_id'

    ]; 


    
    public function floor(): HasOneOrMany
    {
        return $this->hasOne(floor::class, 'foreign_key', 'patient_id');
    }
}
