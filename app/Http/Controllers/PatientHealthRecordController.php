<?php

namespace App\Http\Controllers;

use App\Models\patientAssignedRoom;
use App\Models\patient_healthRecord;
use App\Models\room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatientHealthRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function  isNULL($variable){
        if($variable == NULL){
            return 0;
        }else{
            return $variable;
        }
    }
    public function index()
    {

        $data = patient_healthRecord::all();
        return $data;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $time = now();
        $date = new Carbon( $time ); 
        $roomId = room::select('room_id')->where('room_name', $request['room_name'] )->first()->room_id;

        $latestorder = patient_healthRecord::where('room_id', $roomId)->count();
        $last_id = patient_healthRecord::select('patient_id')->orderBy('created_at', 'desc')->first()->patient_id;
        $currentId = $date->year . $roomId . 'P' . $latestorder;

        if( !empty(patient_healthRecord::select('patient_id')->where('patient_id', $currentId)->first()->patient_id)){
        do{
            $latestorder++;
            $patientId = $date->year . $roomId . 'P' . $latestorder;
            $id = patient_healthRecord::select('patient_id')->where('patient_id', $patientId)->first();
         
        }while(!empty($id));
        }
         $newId = $date->year . $roomId . 'P' . $latestorder;
  

        patient_healthRecord::insert([

            'patient_id' =>  $newId,
            'room_id' => $roomId,
            
            'patient_fName' => $request['patient_fName'],
            'patient_lName' => $request['patient_lName'],
            'patient_mName' => $request['patient_mName'],
            'patient_age' => $this->isNull($request['patient_age']),
            'patient_sex' => $this->isNull($request['patient_sex']),
            'patient_vaccination_stat' => $this->isNull($request['patient_vaccination_stat']),

            'phr_chiefComaplaint' => $this->isNull($request['phr_chiefComaplaint']),
            'phr_startTime' => $this->isNull($request['phr_startTime']),
            'phr_endTime' => $this->isNull($request['phr_endTime']),


            'phr_historyOfPresentIllness' => $this->isNull($request['phr_historyOfPresentIllness']),
            'phr_nonVerbalPatient' => $this->isNull($request['phr_nonVerbalPatient']),
            'phr_HxFromParent' => $this->isNull($request['phr_HxFromParent']),
            'phr_HxFromFamily' => $this->isNull($request['phr_HxFromFamily']),
            'phr_medRecAvailable' => $this->isNull($request['phr_medRecAvailable']),
            'phr_allergies' => $this->isNull($request['phr_allergies']),
            'phr_specifyAllergies' => $this->isNull($request['phr_specifyAllergies']),
            'phr_PMH_Asthma' => $this->isNull($request['phr_PMH_Asthma']),
            'phr_PMH_HTN' => $this->isNull($request['phr_PMH_HTN']),
            'phr_PMH_Thyroid' => $this->isNull($request['phr_PMH_Thyroid']),
            'phr_PMH_Diabetes' => $this->isNull($request['phr_PMH_Diabetes']),
            'phr_PMH_HepaticRenal' => $this->isNull($request['phr_PMH_HepaticRenal']),
            'phr_PMH_Tuberculosis' => $this->isNull($request['phr_PMH_Tuberculosis']),
            'phr_PMH_Psychiatric' => $this->isNull($request['phr_PMH_Psychiatric']),
            'phr_PMH_CAD' => $this->isNull($request['phr_PMH_CAD']),
            'phr_PMH_CHF' => $this->isNull($request['phr_PMH_CHF']),
            'phr_PMH_otherIllness' => $this->isNull($request['phr_PMH_otherIllness']),
            'phr_PMH_specifyOtherIllness' => $this->isNull($request['phr_PMH_specifyOtherIllness']),
            'phr_specifyPrevHospitalization' => $this->isNull($request['phr_specifyPrevHospitalization']),

            'phr_maintenanceMeds' => $this->isNull($request['phr_maintenanceMeds']),
            'phr_specifyMaintenanceMeds' => $this->isNull($request['phr_specifyMaintenanceMeds']),
            'phr_malignancy' => $this->isNull($request['phr_malignancy']),
            'phr_specifyMalignancy' => $this->isNull($request['phr_specifyMalignancy']),
            'phr_surgeries' => $this->isNull($request['phr_surgeries']),
            'phr_specifySurgeries' => $this->isNull($request['phr_specifySurgeries']),
            'phr_vaccinationHistory' => $this->isNull($request['phr_vaccinationHistory']),
            'phr_tobacco' => $this->isNull($request['phr_tobacco']),
            'phr_tobaccoPacks' => $this->isNull($request['phr_tobaccoPacks']),
            'phr_tobaccoQuit' => $this->isNull($request['phr_tobaccoQuit']),
            'phr_recDrugs' => $this->isNull($request['phr_recDrugs']),
            'phr_specifyRecDrugs' => $this->isNull($request['phr_specifyRecDrugs']),
            'phr_alcohol' => $this->isNull($request['phr_alcohol']),
            'phr_alcoholDrinksFrequencyDay' => $this->isNull($request['phr_alcoholDrinksFrequencyDay']),
            'phr_alcoholDrinksFrequencyWeek' => $this->isNull($request['phr_alcoholDrinksFrequencyWeek']),
            'phr_noOfAlcoholDrinks' => $this->isNull($request['phr_noOfAlcoholDrinks']),
            'phr_specifyFamilialDisease' => $this->isNull($request['phr_specifyFamilialDisease']),
            'phr_specifyCivilStatus' => $this->isNull($request['phr_specifyCivilStatus']),
            'phr_specifyPertinentHistory' => $this->isNull($request['phr_specifyPertinentHistory']),
            
   
            

            'phr_bpSitting' => $this->isNull($request['phr_bpSitting']),
            'phr_bpStanding' => $this->isNull($request['phr_bpStanding']),
            'phr_bpLying' => $this->isNull($request['phr_bpLying']),
            'phr_hrRegular' => $this->isNull($request['phr_hrRegular']),
            'phr_hrIrregular' => $this->isNull($request['phr_hrIrregular']),
            'phr_rr' => $this->isNull($request['phr_rr']),
            'phr_T*' => $this->isNull($request['phr_T*']),
            'phr_Sp-02' => $this->isNull($request['phr_Sp-02']),


            'phr_bodyHabitusWNL' => $this->isNull($request['phr_bodyHabitusWNL']),
            'phr_bodyHabitusCathetic' => $this->isNull($request['phr_bodyHabitusCathetic']),
            'phr_bodyHabitusObese' => $this->isNull($request['phr_bodyHabitusObese']),

            'phr_heightCM' => $this->isNull($request['phr_heightCM']),
            'phr_weightKG' => $this->isNull($request['phr_weightKG']),
            'phr_BMI' => $this->isNull($request['phr_BMI']),

            'phr_nasalMucosaSeptumTurbinatesWNL' => $this->isNull($request['phr_nasalMucosaSeptumTurbinatesWNL']),
            'phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent' => $this->isNull($request['phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent']),

            'phr_dentionAndGumsWNL' => $this->isNull($request['phr_dentionAndGumsWNL']),
            'phr_dentionAndGumsDentalCanes' => $this->isNull($request['phr_dentionAndGumsDentalCanes']),
            'phr_dentionAndGumsGingivitis' => $this->isNull($request['phr_dentionAndGumsGingivitis']),

            'phr_oropharynxWNL' => $this->isNull($request['phr_oropharynxWNL']),
            'phr_oropharynxEdeOrEryPresent' => $this->isNull($request['phr_oropharynxEdeOrEryPresent']),
            'phr_oropharynxOralUlcers' => $this->isNull($request['phr_oropharynxOralUlcers']),
            'phr_oropharynxOralPetachie' => $this->isNull($request['phr_oropharynxOralPetachie']),

            'phr_mallampati1' => $this->isNull($request['phr_mallampati1']),
            'phr_mallampati2' => $this->isNull($request['phr_mallampati2']),
            'phr_mallampati3' => $this->isNull($request['phr_mallampati3']),
            'phr_mallampati4' => $this->isNull($request['phr_mallampati4']),

            'phr_neckWNL' => $this->isNull($request['phr_neckWNL']),
            'phr_neckLymphadenopathy' => $this->isNull($request['phr_neckLymphadenopathy']),

            'phr_thyroidWNL' => $this->isNull($request['phr_thyroidWNL']),
            'phr_thyroidThyromegaly' => $this->isNull($request['phr_thyroidThyromegaly']),
            'phr_thyroidNodulesPalpable' => $this->isNull($request['phr_thyroidNodulesPalpable']),
            'phr_thyroidNeckMass' => $this->isNull($request['phr_thyroidNeckMass']),

            'phr_jugularVeinsWNL' => $this->isNull($request['phr_jugularVeinsWNL']),
            'phr_jugularVeinsEngorged' => $this->isNull($request['phr_jugularVeinsEngorged']),

            'phr_chestExpansionAndSymmetrical' => $this->isNull($request['phr_chestExpansionAndSymmetrical']),

            'phr_respiratoryEffortWNL' => $this->isNull($request['phr_respiratoryEffortWNL']),
            'phr_respiratoryEffortAccessoryMuscleUse' => $this->isNull($request['phr_respiratoryEffortAccessoryMuscleUse']),
            'phr_respiratoryEffortIntercostalRetractions' => $this->isNull($request['phr_respiratoryEffortIntercostalRetractions']),
            'phr_respiratoryEffortParadoxicMovements' => $this->isNull($request['phr_respiratoryEffortParadoxicMovements']),

            'phr_tactileFremitusWNL' => $this->isNull($request['phr_tactileFremitusWNL']),
            'phr_tactileFremitusIncreased' => $this->isNull($request['phr_tactileFremitusIncreased']),
            'phr_tactileFremitusDecreased' => $this->isNull($request['phr_tactileFremitusDecreased']),


            'phr_chestPercussionWNL' => $this->isNull($request['phr_chestPercussionWNL']),
            'phr_chestPercussionDullnessToPercussion' => $this->isNull($request['phr_chestPercussionDullnessToPercussion']),
            'phr_chestPercussionHyperResonance' => $this->isNull($request['phr_chestPercussionHyperResonance']),

            
            'phr_AuscultationWNL' => $this->isNull($request['phr_AuscultationWNL']),
            'phr_AuscultationBronchialBreathSounds' => $this->isNull($request['phr_AuscultationBronchialBreathSounds']),
            'phr_AuscultationEgophony' => $this->isNull($request['phr_AuscultationEgophony']),
            'phr_AuscultationRhonchi' => $this->isNull($request['phr_AuscultationRhonchi']),
            'phr_AuscultationRales' => $this->isNull($request['phr_AuscultationRales']),
            'phr_AuscultationWheezes' => $this->isNull($request['phr_AuscultationWheezes']),
            'phr_AuscultationRub' => $this->isNull($request['phr_AuscultationRub']),
            'phr_RespiratoryAdditionalFindings' => $this->isNull($request['phr_RespiratoryAdditionalFindings']),

            'phr_heartSoundsClearS1' => $this->isNull($request['phr_heartSoundsClearS1']),
            'phr_heartSoundsClearS2' => $this->isNull($request['phr_heartSoundsClearS2']),
            'phr_heartSoundsNoMurmur' => $this->isNull($request['phr_heartSoundsNoMurmur']),
            'phr_heartSoundsGallopAudible' => $this->isNull($request['phr_heartSoundsGallopAudible']),
            'phr_heartSoundsRubAudible' => $this->isNull($request['phr_heartSoundsRubAudible']),
            'phr_heartSoundsMurmursPresent' => $this->isNull($request['phr_heartSoundsMurmursPresent']),
            'phr_heartSoundsSystolic' => $this->isNull($request['phr_heartSoundsSystolic']),
            'phr_heartSoundsDiastolic' => $this->isNull($request['phr_heartSoundsDiastolic']),

            'phr_grade' => $this->isNull($request['phr_grade']),
            'phr_CardiovascularAdditionalFindings' => $this->isNull($request['phr_CardiovascularAdditionalFindings ']),

            'phr_abdomenWNL' => $this->isNull($request['phr_abdomenWNL']),
            'phr_massPresent' => $this->isNull($request['phr_massPresent']),
            'phr_specifyMassPresent' => $this->isNull($request['phr_specifyMassPresent']),

            'phr_bowelSoundsNormaoactive' => $this->isNull($request['phr_bowelSoundsNormaoactive']),
            'phr_bowelSoundsUp' => $this->isNull($request['phr_bowelSoundsUp']),
            'phr_bowelSoundsDown' => $this->isNull($request['phr_bowelSoundsDown']),
            'phr_unableToPalpateLiver' => $this->isNull($request['phr_unableToPalpateLiver']),
            'phr_unableToPalpateSpleen' => $this->isNull($request['phr_unableToPalpateSpleen']),
            'phr_organomegalyLiver' => $this->isNull($request['phr_organomegalyLiver']),
            'phr_organomegalySpleen' => $this->isNull($request['phr_organomegalySpleen']),
            'phr_DREFindings' => $this->isNull($request['phr_DREFindings']),

            'phr_kidneyPunchSignNegative' => $this->isNull($request['phr_kidneyPunchSignNegative']),
            'phr_kidneyPunchSignPositive' => $this->isNull($request['phr_kidneyPunchSignPositive']),
            'phr_IfPositiveR' => $this->isNull($request['phr_IfPositiveR']),
            'phr_IfPositiveL' => $this->isNull($request['phr_IfPositiveL']),
            'phr_extremitiesWNL' => $this->isNull($request['phr_extremitiesWNL']),
            'phr_extremitiesClubbing' => $this->isNull($request['phr_extremitiesClubbing']),
            'phr_extremitiesCyanosis' => $this->isNull($request['phr_extremitiesCyanosis']),
            'phr_extremitiesPetachiae' => $this->isNull($request['phr_extremitiesPetachiae']),
            'phr_capillaryRefillTime' => $this->isNull($request['phr_capillaryRefillTime']),

            'phr_skinWNL' => $this->isNull($request['phr_skinWNL']),
            'phr_skinRash' => $this->isNull($request['phr_skinRash']),
            'phr_skinEccymosis' => $this->isNull($request['phr_skinEccymosis']),
            'phr_skinNodules' => $this->isNull($request['phr_skinNodules']),
            'phr_skinUlcer' => $this->isNull($request['phr_skinUlcer']),

            'phr_Assessment' => $this->isNull($request['phr_Assessment']),


            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        return response()->json('done');
    }

    /**
     * Display the specified resource.
     */
    public function show($patient_id)
    {
        try{
            $patient = patient_healthRecord::where('patient_id',$patient_id)->first()->get();
            return response()->json($patient);
        }catch(\Exception $e){
            return response()->json(['error'=>'patient not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(patient_healthRecord $patient_healthRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patient_healthRecord $patient_healthRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        patient_healthRecord::destroy($id);

       
        return response('deleted');
    }

    public function updatePatientHR(Request $request, $id)
    {

       
        $roomId = room::select('room_id')->where('room_name', $request['room_name'] )->first()->room_id;
        patient_healthRecord::where('patient_id', $id)->update(
            [

                'patient_id' => $request['patient_id'],
                'room_id' => $roomId,

                'patient_fName' => $request['patient_fName'],
                'patient_lName' => $request['patient_lName'],
                'patient_mName' => $request['patient_mName'],
                'patient_age' => $request['patient_age'],
                'patient_sex' => $request['patient_sex'],
                'patient_vaccination_stat' => $request['patient_vaccination_stat'],
    
                'phr_chiefComaplaint' => $request['phr_chiefComaplaint'],
                'phr_startTime' => $request['phr_startTime'],
                'phr_endTime' => $request['phr_endTime'],
    
    
                'phr_historyOfPresentIllness' => $request['phr_historyOfPresentIllness'],
                'phr_nonVerbalPatient' => $request['phr_nonVerbalPatient'],
                'phr_HxFromParent' => $request['phr_HxFromParent'],
                'phr_HxFromFamily' => $request['phr_HxFromFamily'],
                'phr_medRecAvailable' => $request['phr_medRecAvailable'],
                'phr_allergies' => $request['phr_allergies'],
                'phr_specifyAllergies' => $request['phr_specifyAllergies'],
                'phr_PMH_Asthma' => $request['phr_PMH_Asthma'],
                'phr_PMH_HTN' => $request['phr_PMH_HTN'],
                'phr_PMH_Thyroid' => $request['phr_PMH_Thyroid'],
                'phr_PMH_Diabetes' => $request['phr_PMH_Diabetes'],
                'phr_PMH_HepaticRenal' => $request['phr_PMH_HepaticRenal'],
                'phr_PMH_Tuberculosis' => $request['phr_PMH_Tuberculosis'],
                'phr_PMH_Psychiatric' => $request['phr_PMH_Psychiatric'],
                'phr_PMH_CAD' => $request['phr_PMH_CAD'],
                'phr_PMH_CHF' => $request['phr_PMH_CHF'],
                'phr_PMH_otherIllness' => $request['phr_PMH_otherIllness'],
                'phr_PMH_specifyOtherIllness' => $request['phr_PMH_specifyOtherIllness'],
                'phr_specifyPrevHospitalization' => $request['phr_specifyPrevHospitalization'],
    
                'phr_maintenanceMeds' => $request['phr_maintenanceMeds'],
                'phr_specifyMaintenanceMeds' => $request['phr_specifyMaintenanceMeds'],
                'phr_malignancy' => $request['phr_malignancy'],
                'phr_specifyMalignancy' => $request['phr_specifyMalignancy'],
                'phr_surgeries' => $request['phr_surgeries'],
                'phr_specifySurgeries' => $request['phr_specifySurgeries'],
                'phr_vaccinationHistory' => $request['phr_vaccinationHistory'],
                'phr_tobacco' => $request['phr_tobacco'],
                'phr_tobaccoPacks' => $request['phr_tobaccoPacks'],
                'phr_tobaccoQuit' => $request['phr_tobaccoQuit'],
                'phr_recDrugs' => $request['phr_recDrugs'],
                'phr_specifyRecDrugs' => $request['phr_specifyRecDrugs'],
                'phr_alcohol' => $request['phr_alcohol'],
                'phr_alcoholDrinksFrequencyDay' => $request['phr_alcoholDrinksFrequencyDay'],
                'phr_alcoholDrinksFrequencyWeek' => $request['phr_alcoholDrinksFrequencyWeek'],
                'phr_noOfAlcoholDrinks' => $request['phr_noOfAlcoholDrinks'],
                'phr_specifyFamilialDisease' => $request['phr_specifyFamilialDisease'],
                'phr_specifyCivilStatus' => $request['phr_specifyCivilStatus'],
                'phr_specifyPertinentHistory' => $request['phr_specifyPertinentHistory'],
                
       
                
    
                'phr_bpSitting' => $request['phr_bpSitting'],
                'phr_bpStanding' => $request['phr_bpStanding'],
                'phr_bpLying' => $request['phr_bpLying'],
                'phr_hrRegular' => $request['phr_hrRegular'],
                'phr_hrIrregular' => $request['phr_hrIrregular'],
                'phr_rr' => $request['phr_rr'],
                'phr_T*' => $request['phr_T*'],
                'phr_Sp02' => $request['phr_Sp02'],
    
    
                'phr_bodyHabitusWNL' => $request['phr_bodyHabitusWNL'],
                'phr_bodyHabitusCathetic' => $request['phr_bodyHabitusCathetic'],
                'phr_bodyHabitusObese' => $request['phr_bodyHabitusObese'],
    
                'phr_heightCM' => $request['phr_heightCM'],
                'phr_weightKG' => $request['phr_weightKG'],
                'phr_BMI' => $request['phr_BMI'],
    
                'phr_nasalMucosaSeptumTurbinatesWNL' => $request['phr_nasalMucosaSeptumTurbinatesWNL'],
                'phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent' => $request['phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent'],
    
                'phr_dentionAndGumsWNL' => $request['phr_dentionAndGumsWNL'],
                'phr_dentionAndGumsDentalCanes' => $request['phr_dentionAndGumsDentalCanes'],
                'phr_dentionAndGumsGingivitis' => $request['phr_dentionAndGumsGingivitis'],
    
                'phr_oropharynxWNL' => $request['phr_oropharynxWNL'],
                'phr_oropharynxEdeOrEryPresent' => $request['phr_oropharynxEdeOrEryPresent'],
                'phr_oropharynxOralUlcers' => $request['phr_oropharynxOralUlcers'],
                'phr_oropharynxOralPetachie' => $request['phr_oropharynxOralPetachie'],
    
                'phr_mallampati1' => $request['phr_mallampati1'],
                'phr_mallampati2' => $request['phr_mallampati2'],
                'phr_mallampati3' => $request['phr_mallampati3'],
                'phr_mallampati4' => $request['phr_mallampati4'],
    
                'phr_neckWNL' => $request['phr_neckWNL'],
                'phr_neckLymphadenopathy' => $request['phr_neckLymphadenopathy'],
    
                'phr_thyroidWNL' => $request['phr_thyroidWNL'],
                'phr_thyroidThyromegaly' => $request['phr_thyroidThyromegaly'],
                'phr_thyroidNodulesPalpable' => $request['phr_thyroidNodulesPalpable'],
                'phr_thyroidNeckMass' => $request['phr_thyroidNeckMass'],
    
                'phr_jugularVeinsWNL' => $request['phr_jugularVeinsWNL'],
                'phr_jugularVeinsEngorged' => $request['phr_jugularVeinsEngorged'],
    
                'phr_chestExpansionAndSymmetrical' => $request['phr_chestExpansionAndSymmetrical'],
    
                'phr_respiratoryEffortWNL' => $request['phr_respiratoryEffortWNL '],
                'phr_respiratoryEffortAccessoryMuscleUse' => $request['phr_respiratoryEffortAccessoryMuscleUse'],
                'phr_respiratoryEffortIntercostalRetractions' => $request['phr_respiratoryEffortIntercostalRetractions'],
                'phr_respiratoryEffortParadoxicMovements' => $request['phr_respiratoryEffortParadoxicMovements'],
    
                'phr_tactileFremitusWNL' => $request['phr_tactileFremitusWNL'],
                'phr_tactileFremitusIncreased' => $request['phr_tactileFremitusIncreased'],
                'phr_tactileFremitusDecreased' => $request['phr_tactileFremitusDecreased'],
    
    
                'phr_chestPercussionWNL' => $request['phr_chestPercussionWNL'],
                'phr_chestPercussionDullnessToPercussion' => $request['phr_chestPercussionDullnessToPercussion'],
                'phr_chestPercussionHyperResonance' => $request['phr_chestPercussionHyperResonance'],
    
                
                'phr_AuscultationWNL' => $request['phr_AuscultationWNL'],
                'phr_AuscultationBronchialBreathSounds' => $request['phr_AuscultationBronchialBreathSounds'],
                'phr_AuscultationEgophony' => $request['phr_AuscultationEgophony'],
                'phr_AuscultationRhonchi' => $request['phr_AuscultationRhonchi'],
                'phr_AuscultationRales' => $request['phr_AuscultationRales'],
                'phr_AuscultationWheezes' => $request['phr_AuscultationWheezes'],
                'phr_AuscultationRub' => $request['phr_AuscultationRub'],
                'phr_RespiratoryAdditionalFindings' => $request['phr_RespiratoryAdditionalFindings'],
    
                'phr_heartSoundsClearS1' => $request['phr_heartSoundsClearS1'],
                'phr_heartSoundsClearS2' => $request['phr_heartSoundsClearS2'],
                'phr_heartSoundsNoMurmur' => $request['phr_heartSoundsNoMurmur'],
                'phr_heartSoundsGallopAudible' => $request['phr_heartSoundsGallopAudible'],
                'phr_heartSoundsRubAudible' => $request['phr_heartSoundsRubAudible'],
                'phr_heartSoundsMurmursPresent' => $request['phr_heartSoundsMurmursPresent'],
                'phr_heartSoundsSystolic' => $request['phr_heartSoundsSystolic'],
                'phr_heartSoundsDiastolic' => $request['phr_heartSoundsDiastolic'],
    
                'phr_grade' => $request['phr_grade'],
                'phr_CardiovascularAdditionalFindings' => $request['phr_CardiovascularAdditionalFindings '],
    
                'phr_abdomenWNL' => $request['phr_abdomenWNL'],
                'phr_massPresent' => $request['phr_massPresent'],
                'phr_specifyMassPresent' => $request['phr_specifyMassPresent'],
    
                'phr_bowelSoundsNormaoactive' => $request['phr_bowelSoundsNormaoactive'],
                'phr_bowelSoundsUp' => $request['phr_bowelSoundsUp'],
                'phr_bowelSoundsDown' => $request['phr_bowelSoundsDown'],
                'phr_unableToPalpateLiver' => $request['phr_unableToPalpateLiver'],
                'phr_unableToPalpateSpleen' => $request['phr_unableToPalpateSpleen'],
                'phr_organomegalyLiver' => $request['phr_organomegalyLiver'],
                'phr_organomegalySpleen' => $request['phr_organomegalySpleen'],
                'phr_DREFindings' => $request['phr_DREFindings'],
    
                'phr_kidneyPunchSignNegative' => $request['phr_kidneyPunchSignNegative'],
                'phr_kidneyPunchSignPositive' => $request['phr_kidneyPunchSignPositive'],
                'phr_IfPositiveR' => $request['phr_IfPositiveR'],
                'phr_IfPositiveL' => $request['phr_IfPositiveL'],
                'phr_extremitiesWNL' => $request['phr_extremitiesWNL'],
                'phr_extremitiesClubbing' => $request['phr_extremitiesClubbing'],
                'phr_extremitiesCyanosis' => $request['phr_extremitiesCyanosis'],
                'phr_extremitiesPetachiae' => $request['phr_extremitiesPetachiae'],
                'phr_capillaryRefillTime' => $request['phr_capillaryRefillTime'],
    
                'phr_skinWNL' => $request['phr_skinWNL'],
                'phr_skinRash' => $request['phr_skinRash'],
                'phr_skinEccymosis' => $request['phr_skinEccymosis'],
                'phr_skinNodules' => $request['phr_skinNodules'],
                'phr_skinUlcer' => $request['phr_skinUlcer'],
    
                'phr_Assessment' => $request['phr_Assessment'],
        
    

                'updated_at' => now(),
        ]);

        return response('done');
    }



    public function getPatientbyRoom($room_id){

        $patient = patient_healthRecord::where('room_id', $room_id)->get();


        return response()->json($patient);
    }


    
    public function checkoutPatient($patient_id){

        $dataToUpdate = [
           'room_id' => null,
        ];

        patient_healthRecord::where('patient_id', $patient_id)->update($dataToUpdate);
        return response()->json('checked out');
    }


}
