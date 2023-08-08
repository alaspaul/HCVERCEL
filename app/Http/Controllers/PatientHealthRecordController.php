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
        $request->validate([
            'patient_fName' => 'required',
            'patient_lName' => 'required',
            'patient_mName' => 'required',
            'patient_age' => 'required',
            'patient_sex' => 'required',
            'patient_vaccination_stat' => 'required',

            'phr_chiefComaplaint' => 'required',
            'phr_startTime' => 'required',
            'phr_endTime' => 'required',


            'phr_historyOfPresentIllness' => 'required',
            'phr_nonVerbalPatient' => 'required',
            'phr_HxFromParent' => 'required',
            'phr_HxFromFamily' => 'required',
            'phr_medRecAvailable' => 'required',
            'phr_allergies' => 'required',
            'phr_PMH_Asthma' => 'required',
            'phr_PMH_HTN' => 'required',
            'phr_PMH_Thyroid' => 'required',
            'phr_PMH_Diabetes' => 'required',
            'phr_PMH_HepaticRenal' => 'required',
            'phr_PMH_Tuberculosis' => 'required',
            'phr_PMH_Psychiatric' => 'required',
            'phr_PMH_CAD' => 'required',
            'phr_PMH_CHF' => 'required',
            'phr_PMH_otherIllness' => 'required',

            'phr_maintenanceMeds' => 'required',
            'phr_malignancy' => 'required',
            'phr_surgeries' => 'required',
            'phr_vaccinationHistory' => 'required',
            'phr_tobacco' => 'required',
            'phr_tobaccoPacks' => 'required',
            'phr_tobaccoQuit' => 'required',
            'phr_recDrugs' => 'required',
            'phr_alcohol' => 'required',
            'phr_alcoholDrinksFrequencyDay' => 'required',
            'phr_alcoholDrinksFrequencyWeek' => 'required',
            'phr_noOfAlcoholDrinks' => 'required',
            
   
            

            'phr_bpSitting' => 'required',
            'phr_bpStanding' => 'required',
            'phr_bpLying' => 'required',
            'phr_heartRate' => 'required',
            'phr_rr' => 'required',
            'phr_T*' => 'required',
            'phr_Sp-02' => 'required',


            'phr_bodyHabitusWNL' => 'required',
            'phr_bodyHabitusCathetic' => 'required',
            'phr_bodyHabitusObese' => 'required',

            'phr_heightCM' => 'required',
            'phr_weightKG' => 'required',
            'phr_BMI' => 'required',

            'phr_nasalMucosaSeptumTurbinatesWNL' => 'required',
            'phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent' => 'required',

            'phr_dentionAndGumsWNL' => 'required',
            'phr_dentionAndGumsDentalCanes' => 'required',
            'phr_dentionAndGumsGingivitis' => 'required',

            'phr_oropharynxWNL' => 'required',
            'phr_oropharynxEdeOrEryPresent' => 'required',
            'phr_oropharynxOralUlcers' => 'required',
            'phr_oropharynxOralPetachie' => 'required',

            'phr_mallampati1' => 'required',
            'phr_mallampati2' => 'required',
            'phr_mallampati3' => 'required',
            'phr_mallampati4' => 'required',

            'phr_neckWNL' => 'required',
            'phr_neckLymphadenopathy' => 'required',

            'phr_thyroidWNL' => 'required',
            'phr_thyroidThyromegaly' => 'required',
            'phr_thyroidNodulesPalpable' => 'required',
            'phr_thyroidNeckMass' => 'required',

            'phr_jugularVeinsWNL' => 'required',
            'phr_jugularVeinsEngorged' => 'required',

            'phr_chestExpansionAndSymmetrical' => 'required',

            'phr_respiratoryEffortWNL' => 'required',
            'phr_respiratoryEffortAccessoryMuscleUse' => 'required',
            'phr_respiratoryEffortIntercostalRetractions' => 'required',
            'phr_respiratoryEffortParadoxicMovements' => 'required',

            'phr_tactileFremitusWNL' => 'required',
            'phr_tactileFremitusIncreased' => 'required',
            'phr_tactileFremitusDecreased' => 'required',


            'phr_chestPercussionWNL' => 'required',
            'phr_chestPercussionDullnessToPercussion' => 'required',
            'phr_chestPercussionHyperResonance' => 'required',

            
            'phr_AuscultationWNL' => 'required',
            'phr_AuscultationBronchialBreathSounds' => 'required',
            'phr_AuscultationEgophony' => 'required',
            'phr_AuscultationRhonchi' => 'required',
            'phr_AuscultationRales' => 'required',
            'phr_AuscultationWheezes' => 'required',
            'phr_AuscultationRub' => 'required',


            'phr_heartSoundsClearS1' => 'required',
            'phr_heartSoundsClearS2' => 'required',
            'phr_heartSoundsNoMurmur' => 'required',
            'phr_heartSoundsGallopAudible' => 'required',
            'phr_heartSoundsRubAudible' => 'required',
            'phr_heartSoundsMurmursPresent' => 'required',
            'phr_heartSoundsSystolic' => 'required',
            'phr_heartSoundsDiastolic' => 'required',

            'phr_grade' => 'required',

            'phr_abdomenWNL' => 'required',
            'phr_massPresent' => 'required',

            'phr_bowelSoundsNormaoactive' => 'required',
            'phr_bowelSoundsUp' => 'required',
            'phr_bowelSoundsDown' => 'required',
            'phr_unableToPalpateLiver' => 'required',
            'phr_unableToPalpateSpleen' => 'required',
            'phr_organomegalyLiver' => 'required',
            'phr_organomegalySpleen' => 'required',

            'phr_kidneyPunchSignNegative' => 'required',
            'phr_kidneyPunchSignPositive' => 'required',
            'phr_IfPositiveR' => 'required',
            'phr_IfPositiveL' => 'required',
            'phr_extremitiesWNL' => 'required',
            'phr_extremitiesClubbing' => 'required',
            'phr_extremitiesCyanosis' => 'required',
            'phr_extremitiesPetachiae' => 'required',
            'phr_capillaryRefillTime' => 'required',

            'phr_skinWNL' => 'required',
            'phr_skinRash' => 'required',
            'phr_skinEccymosis' => 'required',
            'phr_skinNodules' => 'required',
            'phr_skinUlcer' => 'required',

            'phr_Assessment' => 'required',

        ], 
        [
            'patient_fName.required' => 'this field is required',
            'patient_lName.required' => 'this field is required',
            'patient_mName.required' => 'this field is required',
            'patient_age.required' => 'this field is required',
            'patient_sex.required' => 'this field is required',
            'patient_vaccination_stat.required' => 'this field is required',

            'phr_chiefComaplaint.required' => 'this field is required',
            'phr_startTime.required' => 'this field is required',
            'phr_endTime.required' => 'this field is required',


            'phr_historyOfPresentIllness.required' => 'this field is required',
            'phr_nonVerbalPatient.required' => 'this field is required',
            'phr_HxFromParent.required' => 'this field is required',
            'phr_HxFromFamily.required' => 'this field is required',
            'phr_medRecAvailable.required' => 'this field is required',
            'phr_allergies.required' => 'this field is required',
            'phr_PMH_Asthma.required' => 'this field is required',
            'phr_PMH_HTN.required' => 'this field is required',
            'phr_PMH_Thyroid.required' => 'this field is required',
            'phr_PMH_Diabetes.required' => 'this field is required',
            'phr_PMH_HepaticRenal.required' => 'this field is required',
            'phr_PMH_Tuberculosis.required' => 'this field is required',
            'phr_PMH_Psychiatric.required' => 'this field is required',
            'phr_PMH_CAD.required' => 'this field is required',
            'phr_PMH_CHF.required' => 'this field is required',
            'phr_PMH_otherIllness.required' => 'this field is required',

            'phr_maintenanceMeds.required' => 'this field is required',
            'phr_malignancy.required' => 'this field is required',
            'phr_surgeries.required' => 'this field is required',
            'phr_vaccinationHistory.required' => 'this field is required',
            'phr_tobacco.required' => 'this field is required',
            'phr_tobaccoPacks.required' => 'this field is required',
            'phr_tobaccoQuit.required' => 'this field is required',
            'phr_recDrugs.required' => 'this field is required',
            'phr_alcohol.required' => 'this field is required',
            'phr_alcoholDrinksFrequencyDay.required' => 'this field is required',
            'phr_alcoholDrinksFrequencyWeek.required' => 'this field is required',
            'phr_noOfAlcoholDrinks.required' => 'this field is required',
            
   
            

            'phr_bpSitting.required' => 'this field is required',
            'phr_bpStanding.required' => 'this field is required',
            'phr_bpLying.required' => 'this field is required',
            'phr_heartRate.required' => 'this field is required',
            'phr_rr.required' => 'this field is required',
            'phr_T*.required' => 'this field is required',
            'phr_Sp-02.required' => 'this field is required',


            'phr_bodyHabitusWNL.required' => 'this field is required',
            'phr_bodyHabitusCathetic.required' => 'this field is required',
            'phr_bodyHabitusObese.required' => 'this field is required',

            'phr_heightCM.required' => 'this field is required',
            'phr_weightKG.required' => 'this field is required',
            'phr_BMI.required' => 'this field is required',

            'phr_nasalMucosaSeptumTurbinatesWNL.required' => 'this field is required',
            'phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent.required' => 'this field is required',

            'phr_dentionAndGumsWNL.required' => 'this field is required',
            'phr_dentionAndGumsDentalCanes.required' => 'this field is required',
            'phr_dentionAndGumsGingivitis.required' => 'this field is required',

            'phr_oropharynxWNL.required' => 'this field is required',
            'phr_oropharynxEdeOrEryPresent.required' => 'this field is required',
            'phr_oropharynxOralUlcers.required' => 'this field is required',
            'phr_oropharynxOralPetachie.required' => 'this field is required',

            'phr_mallampati1.required' => 'this field is required',
            'phr_mallampati2.required' => 'this field is required',
            'phr_mallampati3.required' => 'this field is required',
            'phr_mallampati4.required' => 'this field is required',

            'phr_neckWNL.required' => 'this field is required',
            'phr_neckLymphadenopathy.required' => 'this field is required',

            'phr_thyroidWNL.required' => 'this field is required',
            'phr_thyroidThyromegaly.required' => 'this field is required',
            'phr_thyroidNodulesPalpable.required' => 'this field is required',
            'phr_thyroidNeckMass.required' => 'this field is required',

            'phr_jugularVeinsWNL.required' => 'this field is required',
            'phr_jugularVeinsEngorged.required' => 'this field is required',

            'phr_chestExpansionAndSymmetrical.required' => 'this field is required',

            'phr_respiratoryEffortWNL.required' => 'this field is required',
            'phr_respiratoryEffortAccessoryMuscleUse.required' => 'this field is required',
            'phr_respiratoryEffortIntercostalRetractions.required' => 'this field is required',
            'phr_respiratoryEffortParadoxicMovements.required' => 'this field is required',

            'phr_tactileFremitusWNL.required' => 'this field is required',
            'phr_tactileFremitusIncreased.required' => 'this field is required',
            'phr_tactileFremitusDecreased.required' => 'this field is required',


            'phr_chestPercussionWNL.required' => 'this field is required',
            'phr_chestPercussionDullnessToPercussion.required' => 'this field is required',
            'phr_chestPercussionHyperResonance.required' => 'this field is required',

            
            'phr_AuscultationWNL.required' => 'this field is required',
            'phr_AuscultationBronchialBreathSounds.required' => 'this field is required',
            'phr_AuscultationEgophony.required' => 'this field is required',
            'phr_AuscultationRhonchi.required' => 'this field is required',
            'phr_AuscultationRales.required' => 'this field is required',
            'phr_AuscultationWheezes.required' => 'this field is required',
            'phr_AuscultationRub.required' => 'this field is required',


            'phr_heartSoundsClearS1.required' => 'this field is required',
            'phr_heartSoundsClearS2.required' => 'this field is required',
            'phr_heartSoundsNoMurmur.required' => 'this field is required',
            'phr_heartSoundsGallopAudible.required' => 'this field is required',
            'phr_heartSoundsRubAudible.required' => 'this field is required',
            'phr_heartSoundsMurmursPresent.required' => 'this field is required',
            'phr_heartSoundsSystolic.required' => 'this field is required',
            'phr_heartSoundsDiastolic.required' => 'this field is required',

            'phr_grade.required' => 'this field is required',

            'phr_abdomenWNL.required' => 'this field is required',
            'phr_massPresent.required' => 'this field is required',

            'phr_bowelSoundsNormaoactive.required' => 'this field is required',
            'phr_bowelSoundsUp.required' => 'this field is required',
            'phr_bowelSoundsDown.required' => 'this field is required',
            'phr_unableToPalpateLiver.required' => 'this field is required',
            'phr_unableToPalpateSpleen.required' => 'this field is required',
            'phr_organomegalyLiver.required' => 'this field is required',
            'phr_organomegalySpleen.required' => 'this field is required',

            'phr_kidneyPunchSignNegative.required' => 'this field is required',
            'phr_kidneyPunchSignPositive.required' => 'this field is required',
            'phr_IfPositiveR.required' => 'this field is required',
            'phr_IfPositiveL.required' => 'this field is required',
            'phr_extremitiesWNL.required' => 'this field is required',
            'phr_extremitiesClubbing.required' => 'this field is required',
            'phr_extremitiesCyanosis.required' => 'this field is required',
            'phr_extremitiesPetachiae.required' => 'this field is required',
            'phr_capillaryRefillTime.required' => 'this field is required',

            'phr_skinWNL.required' => 'this field is required',
            'phr_skinRash.required' => 'this field is required',
            'phr_skinEccymosis.required' => 'this field is required',
            'phr_skinNodules.required' => 'this field is required',
            'phr_skinUlcer.required' => 'this field is required',

            'phr_Assessment.required' => 'this field is required',

        ]);

        
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


            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
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

        $patient = patient_healthRecord::where('room_id', $room_id)->first()->get();


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
