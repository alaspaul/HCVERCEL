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
        Schema::create('patient_health_records', function (Blueprint $table) {
            $table->string('phr_id')->primary(); 

            $table->string('phr_historyOfPresentIllness');
            $table->string('phr_nonVerbalPatient',10);
            $table->string('phr_HxFrom',10);
            $table->string('phr_medRecAvailable',10);
            $table->string('phr_allergies',10);
            $table->string('phr_specifyAllergies');
            $table->string('phr_PMH_Asthma',10);
            $table->string('phr_PMH_HTN',10);
            $table->string('phr_PMH_Thyroid',10);
            $table->string('phr_PMH_Diabetes',10);
            $table->string('phr_PMH_HepaticRenal',10);
            $table->string('phr_PMH_Tuberculosis',10);
            $table->string('phr_PMH_Psychiatric',10);
            $table->string('phr_PMH_CAD',10);
            $table->string('phr_PMH_CHF',10);
            $table->string('phr_PMH_otherIllness',10);
            $table->string('phr_PMH_specifyOtherIllness');
            $table->string('phr_specifyPrevHospitalization');

            $table->string('phr_maintenanceMeds',10);
            $table->string('phr_specifyMaintenanceMeds');
            $table->string('phr_malignancy',10);
            $table->string('phr_specifyMalignancy');
            $table->string('phr_surgeries',10);
            $table->string('phr_specifySurgeries');
            $table->string('phr_vaccinationHistory');
            $table->string('phr_tobacco',10);
            $table->integer('phr_tobaccoPacks');
            $table->dateTime('phr_tobaccoQuit');
            $table->string('phr_recDrugs',10);
            $table->string('phr_specifyRecDrugs');
            $table->string('phr_alcohol',10);
            $table->string('phr_alcoholDrinksFrequency',10);
            $table->integer('phr_noOfAlcoholDrinks');
            $table->string('phr_specifyFamilialDisease');
            $table->string('phr_specifyCivilStatus');
            $table->string('phr_specifyPertinentHistory');

            $table->integer('phr_bpSitting');
            $table->integer('phr_bpStanding');
            $table->integer('phr_bpLying');
            $table->integer('phr_heartRate');
            $table->integer('phr_respiratoryRate');
            $table->integer('phr_oxygenSaturation');

            $table->string('phr_bodyHabitusWNL',10);
            $table->string('phr_bodyHabitusCathetic',10);
            $table->string('phr_bodyHabitusObese',10);

            $table->integer('phr_heightCM');
            $table->integer('phr_weightKG');
            $table->integer('phr_BMI');

            $table->string('phr_nasalMucosaSeptumTurbinatesWNL',10);
            $table->string('phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent',10);

            $table->string('phr_dentionAndGumsWNL',10);
            $table->string('phr_dentionAndGumsDentalCanes',10);
            $table->string('phr_dentionAndGumsGingivitis',10);

            $table->string('phr_oropharynxWNL',10);
            $table->string('phr_oropharynxEdeOrEryPresent',10);
            $table->string('phr_oropharynxOralUlcers',10);
            $table->string('phr_oropharynxOralPetachie',10);

            $table->string('phr_mallampati1',10);
            $table->string('phr_mallampati2',10);
            $table->string('phr_mallampati3',10);
            $table->string('phr_mallampati4',10);

            $table->string('phr_neckWNL',10);
            $table->string('phr_neckLymphadenopathy',10);

            $table->string('phr_thyroidWNL',10);
            $table->string('phr_thyroidThyromegaly',10);
            $table->string('phr_thyroidNodulesPalpable',10);
            $table->string('phr_thyroidNeckMass',10);

            $table->string('phr_jugularVeinsWNL',10);
            $table->string('phr_jugularVeinsEngorged');

            $table->string('phr_respiratoryEffortWNL',10);
            $table->string('phr_respiratoryEffortAccessoryMuscleUse',10);
            $table->string('phr_respiratoryEffortIntercostalRetractions',10);
            $table->string('phr_respiratoryEffortParadoxicMovements',10);

            $table->string('phr_tactileFremitusWNL',10);
            $table->string('phr_tactileFremitusIncreased',10);
            $table->string('phr_tactileFremitusDecreased',10);


            $table->string('phr_chestPercussionWNL',10);
            $table->string('phr_chestPercussionDullnessToPercussion',10);
            $table->string('phr_chestPercussionHyperResonance',10);

            
            $table->string('phr_AuscultationWNL',10);
            $table->string('phr_AuscultationBronchialBreathSounds',10);
            $table->string('phr_AuscultationEgophony',10);
            $table->string('phr_AuscultationRhonchi',10);
            $table->string('phr_AuscultationRales',10);
            $table->string('phr_AuscultationWheezes',10);
            $table->string('phr_AuscultationRub',10);
            $table->string('phr_RespiratoryAdditionalFindings',10);

            $table->string('phr_heartSoundsClearS1',10);
            $table->string('phr_heartSoundsClearS2',10);
            $table->string('phr_heartSoundsNoMurmur',10);
            $table->string('phr_heartSoundsGallopAudible',10);
            $table->string('phr_heartSoundsRubAudible',10);
            $table->string('phr_heartSoundsMurmursPresent',10);
            $table->string('phr_heartSoundsSystolic',10);
            $table->string('phr_heartSoundsDiastolic',10);

            $table->integer('phr_grade');
            $table->string('phr_CardiovascularAdditionalFindings',10);

            $table->string('phr_massPresent',10);
            $table->string('phr_bowelSoundsNormaoactive',10);
            $table->string('phr_bowelSoundsUp',10);
            $table->string('phr_bowelSoundsDown',10);
            $table->string('phr_unableToPalpateLiver',10);
            $table->string('phr_unableToPalpateSpleen',10);
            $table->string('phr_organomegalyLiver',10);
            $table->string('phr_organomegalySpleen',10);
            $table->string('phr_DREFindings',10);

            $table->string('phr_kidneyPunchSignNegative',10);
            $table->string('phr_kidneyPunchSignPositive',10);
            $table->string('phr_IfPositiveR',10);
            $table->string('phr_IfPositiveL',10);
            $table->string('phr_extremitiesWNL',10);
            $table->string('phr_extremitiesClubbing',10);
            $table->string('phr_extremitiesCyanosis',10);
            $table->string('phr_extremitiesPetachiae',10);
            $table->string('phr_capillaryRefillTime',10);

            $table->string('phr_skinWNL',10);
            $table->string('phr_skinRash',10);
            $table->string('phr_skinEccymosis',10);
            $table->string('phr_skinNodules',10);
            $table->string('phr_skinUlcer',10);

            $table->string('phr_Assessment');

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
        Schema::dropIfExists('patient_health_records');
    }
};
