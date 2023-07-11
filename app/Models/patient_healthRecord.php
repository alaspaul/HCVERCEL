<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patient_healthRecord extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'phr_id';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'phr_id',
        'phr_historyOfPresentIllness',
        'phr_nonVerbalPatient',
        'phr_HxFrom',
        'phr_medRecAvailable',
        'phr_allergies',
        'phr_specifyAllergies',
        'phr_PMH_Asthma',
        'phr_PMH_HTN',
        'phr_PMH_Thyroid',
        'phr_PMH_Diabetes',
        'phr_PMH_HepaticRenal',
        'phr_PMH_Tuberculosis',
        'phr_PMH_Psychiatric',
        'phr_PMH_CAD',
        'phr_PMH_CHF',
        'phr_PMH_otherIllness',
        'phr_PMH_specifyOtherIllness',
        'phr_specifyPrevHospitalization',

        'phr_maintenanceMeds',
        'phr_specifyMaintenanceMeds',
        'phr_malignancy',
        'phr_specifyMalignancy',
        'phr_surgeries',
        'phr_specifySurgeries',
        'phr_vaccinationHistory',
        'phr_tobacco',
        'phr_tobaccoPacks',
        'phr_tobaccoQuit',
        'phr_recDrugs',
        'phr_specifyRecDrugs',
        'phr_alcohol',
        'phr_alcoholDrinksFrequency',
        'phr_noOfAlcoholDrinks',
        'phr_specifyFamilialDisease',
        'phr_specifyCivilStatus',
        'phr_specifyPertinentHistory',

        'phr_bpSitting',
        'phr_bpStanding',
        'phr_bpLying',
        'phr_heartRate',
        'phr_respiratoryRate',
        'phr_oxygenSaturation',

        'phr_bodyHabitusWNL',
        'phr_bodyHabitusCathetic',
        'phr_bodyHabitusObese',

        'phr_heightCM',
        'phr_weightKG',
        'phr_BMI',

        'phr_nasalMucosaSeptumTurbinatesWNL',
        'phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent',

        'phr_dentionAndGumsWNL',
        'phr_dentionAndGumsDentalCanes',
        'phr_dentionAndGumsGingivitis',

        'phr_oropharynxWNL',
        'phr_oropharynxEdeOrEryPresent',
        'phr_oropharynxOralUlcers',
        'phr_oropharynxOralPetachie',

        'phr_mallampati1',
        'phr_mallampati2',
        'phr_mallampati3',
        'phr_mallampati4',

        'phr_neckWNL',
        'phr_neckLymphadenopathy',

        'phr_thyroidWNL',
        'phr_thyroidThyromegaly',
        'phr_thyroidNodulesPalpable',
        'phr_thyroidNeckMass',

        'phr_jugularVeinsWNL',
        'phr_jugularVeinsEngorged',

        'phr_respiratoryEffortWNL',
        'phr_respiratoryEffortAccessoryMuscleUse',
        'phr_respiratoryEffortIntercostalRetractions',
        'phr_respiratoryEffortParadoxicMovements',

        'phr_tactileFremitusWNL',
        'phr_tactileFremitusIncreased',
        'phr_tactileFremitusDecreased',


        'phr_chestPercussionWNL',
        'phr_chestPercussionDullnessToPercussion',
        'phr_chestPercussionHyperResonance',

        
        'phr_AuscultationWNL',
        'phr_AuscultationBronchialBreathSounds',
        'phr_AuscultationEgophony',
        'phr_AuscultationRhonchi',
        'phr_AuscultationRales',
        'phr_AuscultationWheezes',
        'phr_AuscultationRub',
        'phr_RespiratoryAdditionalFindings',

        'phr_heartSoundsClearS1',
        'phr_heartSoundsClearS2',
        'phr_heartSoundsNoMurmur',
        'phr_heartSoundsGallopAudible',
        'phr_heartSoundsRubAudible',
        'phr_heartSoundsMurmursPresent',
        'phr_heartSoundsSystolic',
        'phr_heartSoundsDiastolic',

        'phr_grade',
        'phr_CardiovascularAdditionalFindings',

        'phr_massPresent',
        'phr_bowelSoundsNormaoactive',
        'phr_bowelSoundsUp',
        'phr_bowelSoundsDown',
        'phr_unableToPalpateLiver',
        'phr_unableToPalpateSpleen',
        'phr_organomegalyLiver',
        'phr_organomegalySpleen',
        'phr_DREFindings',

        'phr_kidneyPunchSignNegative',
        'phr_kidneyPunchSignPositive',
        'phr_IfPositiveR',
        'phr_IfPositiveL',
        'phr_extremitiesWNL',
        'phr_extremitiesClubbing',
        'phr_extremitiesCyanosis',
        'phr_extremitiesPetachiae',
        'phr_capillaryRefillTime',

        'phr_skinWNL',
        'phr_skinRash',
        'phr_skinEccymosis',
        'phr_skinNodules',
        'phr_skinUlcer',

        'phr_Assessment',
        'patient_id'
    ]; 


    
    public function floor(): HasOneOrMany
    {
        return $this->hasOne(floor::class, 'foreign_key', 'patient_id');
    }
}
