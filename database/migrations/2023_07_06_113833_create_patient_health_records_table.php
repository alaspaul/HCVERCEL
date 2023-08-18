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
            $table->string('patient_id')->primary();
            $table->string('room_id')->nullable();


            $table->string('patient_fName');
            $table->string('patient_lName');
            $table->string('patient_mName');
            $table->integer('patient_age');
            $table->string('patient_sex');
            $table->string('patient_vaccination_stat');

            $table->string('phr_chiefComaplaint');
            $table->time('phr_startTime');
            $table->time('phr_endTime');
            $table->date('date');

            $table->string('phr_historyOfPresentIllness')->nullable();
            $table->string('phr_nonVerbalPatient')->nullable();
            $table->boolean('phr_HxFromParent');
            $table->boolean('phr_HxFromFamily');
            $table->boolean('phr_medRecAvailable');
            $table->boolean('phr_allergies');
            $table->string('phr_specifyAllergies')->nullable();
            $table->boolean('phr_PMH_Asthma');
            $table->boolean('phr_PMH_HTN');
            $table->boolean('phr_PMH_Thyroid');
            $table->boolean('phr_PMH_Diabetes');
            $table->boolean('phr_PMH_HepaticRenal');
            $table->boolean('phr_PMH_Tuberculosis');
            $table->boolean('phr_PMH_Psychiatric');
            $table->boolean('phr_PMH_CAD');
            $table->boolean('phr_PMH_CHF');
            $table->boolean('phr_PMH_otherIllness');
            $table->string('phr_PMH_specifyOtherIllness')->nullable();
            $table->string('phr_specifyPrevHospitalization')->nullable();

            $table->boolean('phr_maintenanceMeds');
            $table->string('phr_specifyMaintenanceMeds')->nullable();
            $table->boolean('phr_malignancy');
            $table->string('phr_specifyMalignancy')->nullable();
            $table->boolean('phr_surgeries');
            $table->string('phr_specifySurgeries')->nullable();
            $table->string('phr_vaccinationHistory')->nullable();
            $table->boolean('phr_tobacco');
            $table->integer('phr_tobaccoPacks');
            $table->dateTime('phr_tobaccoQuit');
            $table->boolean('phr_recDrugs');
            $table->string('phr_specifyRecDrugs')->nullable();
            $table->boolean('phr_alcohol');
            $table->boolean('phr_alcoholDrinksFrequencyDay');
            $table->boolean('phr_alcoholDrinksFrequencyWeek');
            $table->integer('phr_noOfAlcoholDrinks');
            $table->string('phr_specifyFamilialDisease')->nullable();
            $table->string('phr_specifyCivilStatus')->nullable();
            $table->string('phr_specifyPertinentHistory')->nullable();
            
   
            

            $table->integer('phr_bpSitting');
            $table->integer('phr_bpStanding');
            $table->integer('phr_bpLying');
            $table->boolean('phr_hrRegular');
            $table->boolean('phr_hrIrregular');
            $table->integer('phr_rr');
            $table->integer('phr_T*');
            $table->integer('phr_Sp-02');


            $table->boolean('phr_bodyHabitusWNL');
            $table->boolean('phr_bodyHabitusCathetic');
            $table->boolean('phr_bodyHabitusObese');

            $table->integer('phr_heightCM');
            $table->integer('phr_weightKG');
            $table->integer('phr_BMI');

            $table->boolean('phr_nasalMucosaSeptumTurbinatesWNL');
            $table->boolean('phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent');

            $table->boolean('phr_dentionAndGumsWNL');
            $table->boolean('phr_dentionAndGumsDentalCanes');
            $table->boolean('phr_dentionAndGumsGingivitis');

            $table->boolean('phr_oropharynxWNL');
            $table->boolean('phr_oropharynxEdeOrEryPresent');
            $table->boolean('phr_oropharynxOralUlcers');
            $table->boolean('phr_oropharynxOralPetachie');

            $table->boolean('phr_mallampati1')->nullable();
            $table->boolean('phr_mallampati2')->nullable();
            $table->boolean('phr_mallampati3')->nullable();
            $table->boolean('phr_mallampati4')->nullable();

            $table->boolean('phr_neckWNL');
            $table->boolean('phr_neckLymphadenopathy');

            $table->boolean('phr_thyroidWNL');
            $table->boolean('phr_thyroidThyromegaly');
            $table->boolean('phr_thyroidNodulesPalpable');
            $table->boolean('phr_thyroidNeckMass');

            $table->boolean('phr_jugularVeinsWNL');
            $table->boolean('phr_jugularVeinsEngorged');

            $table->boolean('phr_chestExpansionAndSymmetrical');

            $table->boolean('phr_respiratoryEffortWNL');
            $table->boolean('phr_respiratoryEffortAccessoryMuscleUse');
            $table->boolean('phr_respiratoryEffortIntercostalRetractions');
            $table->boolean('phr_respiratoryEffortParadoxicMovements');

            $table->boolean('phr_tactileFremitusWNL');
            $table->boolean('phr_tactileFremitusIncreased');
            $table->boolean('phr_tactileFremitusDecreased');


            $table->boolean('phr_chestPercussionWNL');
            $table->boolean('phr_chestPercussionDullnessToPercussion');
            $table->boolean('phr_chestPercussionHyperResonance');

            
            $table->boolean('phr_AuscultationWNL');
            $table->boolean('phr_AuscultationBronchialBreathSounds');
            $table->boolean('phr_AuscultationEgophony');
            $table->boolean('phr_AuscultationRhonchi');
            $table->boolean('phr_AuscultationRales');
            $table->boolean('phr_AuscultationWheezes');
            $table->boolean('phr_AuscultationRub');
            $table->string('phr_RespiratoryAdditionalFindings')->nullable();

            $table->boolean('phr_heartSoundsClearS1');
            $table->boolean('phr_heartSoundsClearS2');
            $table->boolean('phr_heartSoundsNoMurmur');
            $table->boolean('phr_heartSoundsGallopAudible');
            $table->boolean('phr_heartSoundsRubAudible');
            $table->boolean('phr_heartSoundsMurmursPresent');
            $table->boolean('phr_heartSoundsSystolic');
            $table->boolean('phr_heartSoundsDiastolic');

            $table->integer('phr_grade');
            $table->string('phr_CardiovascularAdditionalFindings')->nullable();

            $table->boolean('phr_abdomenWNL');
            $table->boolean('phr_massPresent');
            $table->string('phr_specifyMassPresent');

            $table->boolean('phr_bowelSoundsNormaoactive');
            $table->boolean('phr_bowelSoundsUp');
            $table->boolean('phr_bowelSoundsDown');
            $table->boolean('phr_unableToPalpateLiver');
            $table->boolean('phr_unableToPalpateSpleen');
            $table->boolean('phr_organomegalyLiver');
            $table->boolean('phr_organomegalySpleen');
            $table->string('phr_DREFindings')->nullable();

            $table->boolean('phr_kidneyPunchSignNegative');
            $table->boolean('phr_kidneyPunchSignPositive');
            $table->boolean('phr_IfPositiveR');
            $table->boolean('phr_IfPositiveL');
            $table->boolean('phr_extremitiesWNL');
            $table->boolean('phr_extremitiesClubbing');
            $table->boolean('phr_extremitiesCyanosis');
            $table->boolean('phr_extremitiesPetachiae');
            $table->integer('phr_capillaryRefillTime');

            $table->boolean('phr_skinWNL');
            $table->boolean('phr_skinRash');
            $table->boolean('phr_skinEccymosis');
            $table->boolean('phr_skinNodules');
            $table->boolean('phr_skinUlcer');

            $table->string('phr_Assessment');

      
            $table->timestamps();

            $table->foreign('room_id')->references('room_id')->on('rooms')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
