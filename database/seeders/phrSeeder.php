<?php

namespace Database\Seeders;

use App\Models\patient_healthRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class phrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $time = now();
        $date = new Carbon($time);

        $phr = [   

            [

                'patient_id' => $date->year . 'RAA1' . 'P1' ,
                'room_id' => 'RAA1',



                'patient_fName' => 'paul irvin',
                'patient_lName' => 'alas',
                'patient_mName' => 'estremos',
                'patient_age' => 22,
                'patient_sex' => 'M',
                'patient_vaccination_stat' => 'PFIZER 2x',
    
                'phr_chiefComaplaint' => 'none',
                'phr_startTime' =>Carbon::createFromTime(12, 30, 0)->format('H:i:s') ,
                'phr_endTime' => Carbon::createFromTime(12, 30, 0)->format('H:i:s') ,
                'date' => $date,
    
                'phr_historyOfPresentIllness' => 'none',
                'phr_nonVerbalPatient' => 'none',
                'phr_HxFromParent' => 0,
                'phr_HxFromFamily' => 0,
                'phr_medRecAvailable' => 0,
                'phr_allergies' => 0,
                'phr_specifyAllergies' => 'none',
                'phr_PMH_Asthma' => 0,
                'phr_PMH_HTN' => 0,
                'phr_PMH_Thyroid' => 0,
                'phr_PMH_Diabetes' => 0,
                'phr_PMH_HepaticRenal' => 0,
                'phr_PMH_Tuberculosis' => 0,
                'phr_PMH_Psychiatric' => 0,
                'phr_PMH_CAD' => 0,
                'phr_PMH_CHF' => 0,
                'phr_PMH_otherIllness' => 0,
                'phr_PMH_specifyOtherIllness' => 'none',
                'phr_specifyPrevHospitalization' => 'none',
    
                'phr_maintenanceMeds' => 0,
                'phr_specifyMaintenanceMeds' => 'none',
                'phr_malignancy' => 0,
                'phr_specifyMalignancy' => 'none',
                'phr_surgeries' => 0,
                'phr_specifySurgeries' => 'none',
                'phr_vaccinationHistory' => 'none',
                'phr_tobacco' => 0,
                'phr_tobaccoPacks' => 2,
                'phr_tobaccoQuit' => now(),
                'phr_recDrugs' => 0,
                'phr_specifyRecDrugs' => 'none',
                'phr_alcohol' => 0,
                'phr_alcoholDrinksFrequencyDay' => 0,
                'phr_alcoholDrinksFrequencyWeek' => 0,
                'phr_noOfAlcoholDrinks' => 2,
                'phr_specifyFamilialDisease' => 'none',
                'phr_specifyCivilStatus' => 'none',
                'phr_specifyPertinentHistory' => 'none',
                
       
                
    
                'phr_bpSitting' => 222,
                'phr_bpStanding' => 222,
                'phr_bpLying' => 222,
                'phr_hrRegular' => 0,
                'phr_hrIrregular' => 0,
                'phr_rr' => 2222,
                'phr_T*' => 2222,
                'phr_Sp-02' => 2222,
    
    
                'phr_bodyHabitusWNL' => 0,
                'phr_bodyHabitusCathetic' => 0,
                'phr_bodyHabitusObese' => 0,
    
                'phr_heightCM' => 123,
                'phr_weightKG' => 123,
                'phr_BMI' => 123,
    
                'phr_nasalMucosaSeptumTurbinatesWNL' => 0,
                'phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent' => 0,
    
                'phr_dentionAndGumsWNL' => 0,
                'phr_dentionAndGumsDentalCanes' => 0,
                'phr_dentionAndGumsGingivitis' => 0,
    
                'phr_oropharynxWNL' => 0,
                'phr_oropharynxEdeOrEryPresent' => 0,
                'phr_oropharynxOralUlcers' => 0,
                'phr_oropharynxOralPetachie' => 0,
    
                'phr_mallampati1' => 0,
                'phr_mallampati2' => 0,
                'phr_mallampati3' => 0,
                'phr_mallampati4' => 0,
    
                'phr_neckWNL' => 0,
                'phr_neckLymphadenopathy' => 0,
    
                'phr_thyroidWNL' => 0,
                'phr_thyroidThyromegaly' => 0,
                'phr_thyroidNodulesPalpable' => 0,
                'phr_thyroidNeckMass' => 0,
    
                'phr_jugularVeinsWNL' => 0,
                'phr_jugularVeinsEngorged' => 0,
    
                'phr_chestExpansionAndSymmetrical' => 0,
    
                'phr_respiratoryEffortWNL' => 0,
                'phr_respiratoryEffortAccessoryMuscleUse' => 0,
                'phr_respiratoryEffortIntercostalRetractions' => 0,
                'phr_respiratoryEffortParadoxicMovements' => 0,
    
                'phr_tactileFremitusWNL' => 0,
                'phr_tactileFremitusIncreased' => 0,
                'phr_tactileFremitusDecreased' => 0,
    
    
                'phr_chestPercussionWNL' => 0,
                'phr_chestPercussionDullnessToPercussion' => 0,
                'phr_chestPercussionHyperResonance' => 0,
    
                
                'phr_AuscultationWNL' => 0,
                'phr_AuscultationBronchialBreathSounds' => 0,
                'phr_AuscultationEgophony' => 0,
                'phr_AuscultationRhonchi' => 0,
                'phr_AuscultationRales' => 0,
                'phr_AuscultationWheezes' => 0,
                'phr_AuscultationRub' => 0,
                'phr_RespiratoryAdditionalFindings' => 'none',
    
                'phr_heartSoundsClearS1' => 0,
                'phr_heartSoundsClearS2' => 0,
                'phr_heartSoundsNoMurmur' => 0,
                'phr_heartSoundsGallopAudible' => 0,
                'phr_heartSoundsRubAudible' => 0,
                'phr_heartSoundsMurmursPresent' => 0,
                'phr_heartSoundsSystolic' => 0,
                'phr_heartSoundsDiastolic' => 0,
    
                'phr_grade' => 2,
                'phr_CardiovascularAdditionalFindings' => 'none',
    
                'phr_abdomenWNL' => 0,
                'phr_massPresent' => 0,
                'phr_specifyMassPresent' => 'none',
    
                'phr_bowelSoundsNormaoactive' => 0,
                'phr_bowelSoundsUp' => 0,
                'phr_bowelSoundsDown' => 0,
                'phr_unableToPalpateLiver' => 0,
                'phr_unableToPalpateSpleen' => 0,
                'phr_organomegalyLiver' => 0,
                'phr_organomegalySpleen' => 0,
                'phr_DREFindings' => 'none',
    
                'phr_kidneyPunchSignNegative' => 0,
                'phr_kidneyPunchSignPositive' => 0,
                'phr_IfPositiveR' => 0,
                'phr_IfPositiveL' => 0,
                'phr_extremitiesWNL' => 0,
                'phr_extremitiesClubbing' => 0,
                'phr_extremitiesCyanosis' => 0,
                'phr_extremitiesPetachiae' => 0,
                'phr_capillaryRefillTime' => 3,
    
                'phr_skinWNL' => 0,
                'phr_skinRash' => 0,
                'phr_skinEccymosis' => 0,
                'phr_skinNodules' => 0,
                'phr_skinUlcer' => 0,
    
                'phr_Assessment' => 'none',
               
            ],
            
       ];

       patient_healthRecord::insert($phr);
    }
}

