<?php

namespace App\Http\Controllers;

use App\Models\patient_healthRecord;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        patient_healthRecord::insert([
        'phr_id' => $request['phr_id'],

        'phr_historyOfPresentIllness' => $request['phr_historyOfPresentIllness'],
        'phr_nonVerbalPatient' => $request['phr_nonVerbalPatient'],
        'phr_HxFrom' => $request['phr_HxFrom'],
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
        'phr_alcoholDrinksFrequency' => $request['phr_alcoholDrinksFrequency'],
        'phr_noOfAlcoholDrinks' => $request['phr_noOfAlcoholDrinks'],
        'phr_specifyFamilialDisease' => $request['phr_specifyFamilialDisease'],
        'phr_specifyCivilStatus' => $request['phr_specifyCivilStatus'],
        'phr_specifyPertinentHistory' => $request['phr_specifyPertinentHistory'],

        'phr_bpSitting' => $request['phr_bpSitting'],
        'phr_bpStanding' => $request['phr_bpStanding'],
        'phr_bpLying' => $request['phr_bpLying'],
        'phr_heartRate' => $request['phr_heartRate'],
        'phr_respiratoryRate' => $request['phr_respiratoryRate'],
        'phr_oxygenSaturation' => $request['phr_oxygenSaturation'],

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

        'phr_respiratoryEffortWNL' => $request['phr_respiratoryEffortWNL'],
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
        'phr_CardiovascularAdditionalFindings' => $request['phr_CardiovascularAdditionalFindings'],

        'phr_massPresent' => $request['phr_massPresent'],
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
        'patient_id' => $request['patient_id'],

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(patient_healthRecord $patient_healthRecord)
    {
        //
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
       
        
        patient_healthRecord::where('phr_id', $id)->update(
            [

                'phr_historyOfPresentIllness' => $request['phr_historyOfPresentIllness'],
                'phr_nonVerbalPatient' => $request['phr_nonVerbalPatient'],
                'phr_HxFrom' => $request['phr_HxFrom'],
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
                'phr_alcoholDrinksFrequency' => $request['phr_alcoholDrinksFrequency'],
                'phr_noOfAlcoholDrinks' => $request['phr_noOfAlcoholDrinks'],
                'phr_specifyFamilialDisease' => $request['phr_specifyFamilialDisease'],
                'phr_specifyCivilStatus' => $request['phr_specifyCivilStatus'],
                'phr_specifyPertinentHistory' => $request['phr_specifyPertinentHistory'],
        
                'phr_bpSitting' => $request['phr_bpSitting'],
                'phr_bpStanding' => $request['phr_bpStanding'],
                'phr_bpLying' => $request['phr_bpLying'],
                'phr_heartRate' => $request['phr_heartRate'],
                'phr_respiratoryRate' => $request['phr_respiratoryRate'],
                'phr_oxygenSaturation' => $request['phr_oxygenSaturation'],
        
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
        
                'phr_respiratoryEffortWNL' => $request['phr_respiratoryEffortWNL'],
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
                'phr_CardiovascularAdditionalFindings' => $request['phr_CardiovascularAdditionalFindings'],
        
                'phr_massPresent' => $request['phr_massPresent'],
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
                'patient_id' => $request['patient_id'],
    

                'updated_at' => now(),
        ]);

        return response('done');
    }
}
