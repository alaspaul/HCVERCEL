<?php

namespace App\Http\Controllers;

use App\Models\physicalExam;
use Illuminate\Http\Request;

class PhysicalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = physicalExam::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        physicalExam::insert([
            'physicExam_id' => $request['physicExam_id'],
            'patient_id' => $request['patient_id'],


            'patient_head'=> $request['patient_head'],
            'patient_forehead'=> $request['patient_forehead'],
            'patient_nose'=> $request['patient_nose'],
            'patient_mouth'=> $request['patient_mouth'],
            'patient_neck'=> $request['patient_neck'],
            'patient_rightEye'=> $request['patient_rightEye'],
            'patient_leftEye'=> $request['patient_leftEye'],
            'patient_rightEar'=> $request['patient_rightEar'],
            'patient_leftEar'=> $request['patient_leftEar'],
            'patient_nape'=> $request['patient_nape'],


            'patient_rightBreast'=> $request['patient_rightBreast'],
            'patient_leftBreast'=> $request['patient_leftBreast'],
            'patient_rightLung'=> $request['patient_rightLung'],
            'patient_leftLung'=> $request['patient_leftLung'],
            'patient_rightShoulderBlade'=> $request['patient_rightShoulderBlade'],
            'patient_leftShoulderBlade'=> $request['patient_leftShoulderBlade'],
            'patient_stomach'=> $request['patient_stomach'],
            'patient_abdomen'=> $request['patient_abdomen'],
            'patient_waist'=> $request['patient_waist'],

            'patient_rightShoudler'=> $request['patient_rightShoudler'],
            'patient_leftShoudler'=> $request['patient_leftShoudler'],
            'patient_rightArm'=> $request['patient_rightArm'],
            'patient_leftArm'=> $request['patient_leftArm'],
            'patient_rightForearm'=> $request['patient_rightForearm'],
            'patient_leftForearm'=> $request['patient_leftForearm'],
            'patient_rightWrist'=> $request['patient_rightWrist'],
            'patient_leftWrist'=> $request['patient_leftWrist'],
            'patient_rightHand'=> $request['patient_rightHand'],
            'patient_leftHand'=> $request['patient_leftHand'],


            'patient_rightThigh'=> $request['patient_rightThigh'],
            'patient_leftThigh'=> $request['patient_leftThigh'],
            'patient_rightKnee'=> $request['patient_rightKnee'],
            'patient_leftKnee'=> $request['patient_leftKnee'],
            'patient_rightLeg'=> $request['patient_rightLeg'],
            'patient_leftLeg'=> $request['patient_leftLeg'],
            'patient_rightAnkle'=> $request['patient_rightAnkle'],
            'patient_leftAnkle'=> $request['patient_leftAnkle'],
            'patient_rightCalf'=> $request['patient_rightCalf'],
            'patient_leftCalf'=> $request['patient_leftCalf'],
            'patient_rightFoot'=> $request['patient_rightFoot'],
            'patient_leftFoot'=> $request['patient_leftFoot'],


            'specify_patient_head'=> $request['specify_patient_head'],
            'specify_patient_forehead'=> $request['specify_patient_forehead'],
            'specify_patient_nose'=> $request['specify_patient_nose'],
            'specify_patient_mouth'=> $request['specify_patient_mouth'],
            'specify_patient_neck'=> $request['specify_patient_neck'],
            'specify_patient_rightEye'=> $request['specify_patient_rightEye'],
            'specify_patient_leftEye'=> $request['specify_patient_leftEye'],
            'specify_patient_rightEar'=> $request['specify_patient_rightEar'],
            'specify_patient_leftEar'=> $request['specify_patient_leftEar'],
            'specify_patient_nape'=> $request['specify_patient_nape'],


            'specify_patient_rightBreast'=> $request['specify_patient_rightBreast'],
            'specify_patient_leftBreast'=> $request['specify_patient_leftBreast'],
            'specify_patient_rightLung'=> $request['specify_patient_rightLung'],
            'specify_patient_leftLung'=> $request['specify_patient_leftLung'],
            'specify_patient_rightShoulderBlade'=> $request['specify_patient_rightShoulderBlade'],
            'specify_patient_leftShoulderBlade'=> $request['specify_patient_leftShoulderBlade'],
            'specify_patient_stomach'=> $request['specify_patient_stomach'],
            'specify_patient_abdomen'=> $request['specify_patient_abdomen'],
            'specify_patient_waist'=> $request[' specify_patient_waist '],

            'specify_patient_rightShoudler'=> $request['specify_patient_rightShoudler'],
            'specify_patient_leftShoudler'=> $request['specify_patient_leftShoudler'],
            'specify_patient_rightArm'=> $request['specify_patient_rightArm'],
            'specify_patient_leftArm'=> $request['specify_patient_leftArm'],
            'specify_patient_rightForearm'=> $request['specify_patient_rightForearm'],
            'specify_patient_leftForearm'=> $request['specify_patient_leftForearm'],
            'specify_patient_rightWrist'=> $request['specify_patient_rightWrist'],
            'specify_patient_leftWrist'=> $request['specify_patient_leftWrist'],
            'specify_patient_rightHand'=> $request['specify_patient_rightHand'],
            'specify_patient_leftHand'=> $request['specify_patient_leftHand'],


            'specify_patient_rightThigh'=> $request['specify_patient_rightThigh'],
            'specify_patient_leftThigh'=> $request['specify_patient_leftThigh'],
            'specify_patient_rightKnee'=> $request['specify_patient_rightKnee'],
            'specify_patient_leftKnee'=> $request['specify_patient_leftKnee'],
            'specify_patient_rightLeg'=> $request['specify_patient_rightLeg'],
            'specify_patient_leftLeg'=> $request['specify_patient_leftLeg'],
            'specify_patient_rightAnkle'=> $request['specify_patient_rightAnkle'],
            'specify_patient_leftAnkle'=> $request['specify_patient_leftAnkle'],
            'specify_patient_rightCalf'=> $request['specify_patient_rightCalf'],
            'specify_patient_leftCalf'=> $request['specify_patient_leftCalf'],
            'specify_patient_rightFoot'=> $request['specify_patient_rightFoot'],
            'specify_patient_leftFoot'=> $request['specify_patient_leftFoot'],



            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(physicalExam $physicalExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(physicalExam $physicalExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, physicalExam $physicalExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        physicalExam::destroy($id);

       
        return response('deleted');
    }

    public function updatePhysicalExam(Request $request, $id)
    {
       
        
        physicalExam::where('physicExam_id', $id)->update(
            [
  
                'patient_id' => $request['patient_id'],
    
    
                'patient_head'=> $request['patient_head'],
                'patient_forehead'=> $request['patient_forehead'],
                'patient_nose'=> $request['patient_nose'],
                'patient_mouth'=> $request['patient_mouth'],
                'patient_neck'=> $request['patient_neck'],
                'patient_rightEye'=> $request['patient_rightEye'],
                'patient_leftEye'=> $request['patient_leftEye'],
                'patient_rightEar'=> $request['patient_rightEar'],
                'patient_leftEar'=> $request['patient_leftEar'],
                'patient_nape'=> $request['patient_nape'],
    
    
                'patient_rightBreast'=> $request['patient_rightBreast'],
                'patient_leftBreast'=> $request['patient_leftBreast'],
                'patient_rightLung'=> $request['patient_rightLung'],
                'patient_leftLung'=> $request['patient_leftLung'],
                'patient_rightShoulderBlade'=> $request['patient_rightShoulderBlade'],
                'patient_leftShoulderBlade'=> $request['patient_leftShoulderBlade'],
                'patient_stomach'=> $request['patient_stomach'],
                'patient_abdomen'=> $request['patient_abdomen'],
                'patient_waist'=> $request['patient_waist'],
    
                'patient_rightShoudler'=> $request['patient_rightShoudler'],
                'patient_leftShoudler'=> $request['patient_leftShoudler'],
                'patient_rightArm'=> $request['patient_rightArm'],
                'patient_leftArm'=> $request['patient_leftArm'],
                'patient_rightForearm'=> $request['patient_rightForearm'],
                'patient_leftForearm'=> $request['patient_leftForearm'],
                'patient_rightWrist'=> $request['patient_rightWrist'],
                'patient_leftWrist'=> $request['patient_leftWrist'],
                'patient_rightHand'=> $request['patient_rightHand'],
                'patient_leftHand'=> $request['patient_leftHand'],
    
    
                'patient_rightThigh'=> $request['patient_rightThigh'],
                'patient_leftThigh'=> $request['patient_leftThigh'],
                'patient_rightKnee'=> $request['patient_rightKnee'],
                'patient_leftKnee'=> $request['patient_leftKnee'],
                'patient_rightLeg'=> $request['patient_rightLeg'],
                'patient_leftLeg'=> $request['patient_leftLeg'],
                'patient_rightAnkle'=> $request['patient_rightAnkle'],
                'patient_leftAnkle'=> $request['patient_leftAnkle'],
                'patient_rightCalf'=> $request['patient_rightCalf'],
                'patient_leftCalf'=> $request['patient_leftCalf'],
                'patient_rightFoot'=> $request['patient_rightFoot'],
                'patient_leftFoot'=> $request['patient_leftFoot'],
    
    
                'specify_patient_head'=> $request['specify_patient_head'],
                'specify_patient_forehead'=> $request['specify_patient_forehead'],
                'specify_patient_nose'=> $request['specify_patient_nose'],
                'specify_patient_mouth'=> $request['specify_patient_mouth'],
                'specify_patient_neck'=> $request['specify_patient_neck'],
                'specify_patient_rightEye'=> $request['specify_patient_rightEye'],
                'specify_patient_leftEye'=> $request['specify_patient_leftEye'],
                'specify_patient_rightEar'=> $request['specify_patient_rightEar'],
                'specify_patient_leftEar'=> $request['specify_patient_leftEar'],
                'specify_patient_nape'=> $request['specify_patient_nape'],
    
    
                'specify_patient_rightBreast'=> $request['specify_patient_rightBreast'],
                'specify_patient_leftBreast'=> $request['specify_patient_leftBreast'],
                'specify_patient_rightLung'=> $request['specify_patient_rightLung'],
                'specify_patient_leftLung'=> $request['specify_patient_leftLung'],
                'specify_patient_rightShoulderBlade'=> $request['specify_patient_rightShoulderBlade'],
                'specify_patient_leftShoulderBlade'=> $request['specify_patient_leftShoulderBlade'],
                'specify_patient_stomach'=> $request['specify_patient_stomach'],
                'specify_patient_abdomen'=> $request['specify_patient_abdomen'],
                'specify_patient_waist'=> $request[' specify_patient_waist '],
    
                'specify_patient_rightShoudler'=> $request['specify_patient_rightShoudler'],
                'specify_patient_leftShoudler'=> $request['specify_patient_leftShoudler'],
                'specify_patient_rightArm'=> $request['specify_patient_rightArm'],
                'specify_patient_leftArm'=> $request['specify_patient_leftArm'],
                'specify_patient_rightForearm'=> $request['specify_patient_rightForearm'],
                'specify_patient_leftForearm'=> $request['specify_patient_leftForearm'],
                'specify_patient_rightWrist'=> $request['specify_patient_rightWrist'],
                'specify_patient_leftWrist'=> $request['specify_patient_leftWrist'],
                'specify_patient_rightHand'=> $request['specify_patient_rightHand'],
                'specify_patient_leftHand'=> $request['specify_patient_leftHand'],
    
    
                'specify_patient_rightThigh'=> $request['specify_patient_rightThigh'],
                'specify_patient_leftThigh'=> $request['specify_patient_leftThigh'],
                'specify_patient_rightKnee'=> $request['specify_patient_rightKnee'],
                'specify_patient_leftKnee'=> $request['specify_patient_leftKnee'],
                'specify_patient_rightLeg'=> $request['specify_patient_rightLeg'],
                'specify_patient_leftLeg'=> $request['specify_patient_leftLeg'],
                'specify_patient_rightAnkle'=> $request['specify_patient_rightAnkle'],
                'specify_patient_leftAnkle'=> $request['specify_patient_leftAnkle'],
                'specify_patient_rightCalf'=> $request['specify_patient_rightCalf'],
                'specify_patient_leftCalf'=> $request['specify_patient_leftCalf'],
                'specify_patient_rightFoot'=> $request['specify_patient_rightFoot'],
                'specify_patient_leftFoot'=> $request['specify_patient_leftFoot'],
                
    
            'updated_at' => now(),
        ]);

        return response('done');
    }
}
