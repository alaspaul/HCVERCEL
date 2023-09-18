<?php

namespace Database\Seeders;

use App\Models\phr_categoryAttributes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoryAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryAtt = [   
            
            [
                'categoryAtt_id' => 'FC0CA0',
                'categoryAtt_name' => 'phr_bpSitting',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA1',
                'categoryAtt_name' => 'phr_bpStanding',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA2',
                'categoryAtt_name' => 'phr_bpLying',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA3',
                'categoryAtt_name' => 'phr_hrRegular',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA4',
                'categoryAtt_name' => 'phr_hrIrregular',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA5',
                'categoryAtt_name' => 'phr_rr',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA6',
                'categoryAtt_name' => 'phr_T*',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA7',
                'categoryAtt_name' => 'phr_Sp-02',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],









            [
                'categoryAtt_id' => 'FC1CA0',
                'categoryAtt_name' => 'phr_nasalMucosaSeptumTurbinatesWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA1',
                'categoryAtt_name' => 'phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA2',
                'categoryAtt_name' => 'phr_dentionAndGumsWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA3',
                'categoryAtt_name' => 'phr_dentionAndGumsDentalCanes',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA4',
                'categoryAtt_name' => 'phr_dentionAndGumsGingivitis',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA5',
                'categoryAtt_name' => 'phr_oropharynxWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA6',
                'categoryAtt_name' => 'phr_oropharynxEdeOrEryPresent',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA7',
                'categoryAtt_name' => 'phr_oropharynxOralUlcers',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA8',
                'categoryAtt_name' => 'phr_oropharynxOralPetachie',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA9',
                'categoryAtt_name' => 'phr_oropharynxOralPetachie',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA10',
                'categoryAtt_name' => 'phr_mallampati1',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA11',
                'categoryAtt_name' => 'phr_mallampati2',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA12',
                'categoryAtt_name' => 'phr_mallampati3',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA13',
                'categoryAtt_name' => 'phr_mallampati4',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],










            [
                'categoryAtt_id' => 'FC2CA0',
                'categoryAtt_name' => 'phr_neckWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA1',
                'categoryAtt_name' => 'phr_neckLymphadenopathy',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA2',
                'categoryAtt_name' => 'phr_thyroidWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA3',
                'categoryAtt_name' => 'phr_thyroidThyromegaly',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA4',
                'categoryAtt_name' => 'phr_thyroidNodulesPalpable',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA5',
                'categoryAtt_name' => 'phr_thyroidNeckMass',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA6',
                'categoryAtt_name' => 'phr_jugularVeinsWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA7',
                'categoryAtt_name' => 'phr_jugularVeinsEngorged',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],







            [
                'categoryAtt_id' => 'FC3CA0',
                'categoryAtt_name' => 'phr_chestExpansionAndSymmetrical',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA1',
                'categoryAtt_name' => 'phr_respiratoryEffortWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA2',
                'categoryAtt_name' => 'phr_respiratoryEffortAccessoryMuscleUse',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA3',
                'categoryAtt_name' => 'phr_respiratoryEffortIntercostalRetractions',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA4',
                'categoryAtt_name' => 'phr_respiratoryEffortParadoxicMovements',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA5',
                'categoryAtt_name' => 'phr_tactileFremitusWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
            

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA6',
                'categoryAtt_name' => 'phr_tactileFremitusIncreased',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA7',
                'categoryAtt_name' => 'phr_tactileFremitusDecreased',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA8',
                'categoryAtt_name' => 'phr_chestPercussionWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA9',
                'categoryAtt_name' => 'phr_chestPercussionDullnessToPercussion',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA10',
                'categoryAtt_name' => 'phr_chestPercussionHyperResonance',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA11',
                'categoryAtt_name' => 'phr_AuscultationWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA12',
                'categoryAtt_name' => 'phr_AuscultationBronchialBreathSounds',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA13',
                'categoryAtt_name' => 'phr_AuscultationEgophony',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA14',
                'categoryAtt_name' => 'phr_AuscultationRhonchi',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA15',
                'categoryAtt_name' => 'phr_AuscultationRales',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA16',
                'categoryAtt_name' => 'phr_AuscultationWheezes',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA17',
                'categoryAtt_name' => 'phr_AuscultationRub',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA18',
                'categoryAtt_name' => 'phr_RespiratoryAdditionalFindings',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],







            [
                'categoryAtt_id' => 'FC4CA0',
                'categoryAtt_name' => 'phr_heartSoundsClearS1',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA1',
                'categoryAtt_name' => 'phr_heartSoundsClearS2',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA2',
                'categoryAtt_name' => 'phr_heartSoundsNoMurmur',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA3',
                'categoryAtt_name' => 'phr_heartSoundsGallopAudible',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA4',
                'categoryAtt_name' => 'phr_heartSoundsRubAudible',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA5',
                'categoryAtt_name' => 'phr_heartSoundsMurmursPresent',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA6',
                'categoryAtt_name' => 'phr_heartSoundsSystolic',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA7',
                'categoryAtt_name' => 'phr_heartSoundsDiastolic',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA8',
                'categoryAtt_name' => 'phr_grade',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA9',
                'categoryAtt_name' => 'phr_CardiovascularAdditionalFindings',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],


        




            [
                'categoryAtt_id' => 'FC5CA0',
                'categoryAtt_name' => 'phr_abdomenWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA1',
                'categoryAtt_name' => 'phr_massPresent',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA2',
                'categoryAtt_name' => 'phr_specifyMassPresent',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA3',
                'categoryAtt_name' => 'phr_specifyMassPresent',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA4',
                'categoryAtt_name' => 'phr_bowelSoundsNormaoactive',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA5',
                'categoryAtt_name' => 'phr_bowelSoundsUp',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA6',
                'categoryAtt_name' => 'phr_bowelSoundsDown',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA7',
                'categoryAtt_name' => 'phr_unableToPalpateLiver',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA8',
                'categoryAtt_name' => 'phr_unableToPalpateSpleen',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA9',
                'categoryAtt_name' => 'phr_organomegalyLiver',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA10',
                'categoryAtt_name' => 'phr_organomegalySpleen',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA11',
                'categoryAtt_name' => 'phr_DREFindings',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],







            [
                'categoryAtt_id' => 'FC6CA0',
                'categoryAtt_name' => 'phr_kidneyPunchSignNegative',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC6'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC6CA1',
                'categoryAtt_name' => 'phr_kidneyPunchSignPositive',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC6'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC6CA2',
                'categoryAtt_name' => 'phr_IfPositiveR',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC6'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC6CA3',
                'categoryAtt_name' => 'phr_IfPositiveL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC6'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],









            [
                'categoryAtt_id' => 'FC7CA0',
                'categoryAtt_name' => 'phr_extremitiesWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC7'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC7CA1',
                'categoryAtt_name' => 'phr_extremitiesClubbing',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC7'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC7CA2',
                'categoryAtt_name' => 'phr_extremitiesCyanosis',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC7'
            

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC7CA3',
                'categoryAtt_name' => 'phr_extremitiesPetachiae',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC7'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC7CA4',
                'categoryAtt_name' => 'phr_capillaryRefillTime',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC7'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],








            [
                'categoryAtt_id' => 'FC8CA0',
                'categoryAtt_name' => 'phr_skinWNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC8CA1',
                'categoryAtt_name' => 'phr_skinRash',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC8CA2',
                'categoryAtt_name' => 'phr_skinEccymosis',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC8CA3',
                'categoryAtt_name' => 'phr_skinNodules',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC8CA4',
                'categoryAtt_name' => 'phr_skinUlcer',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],








            [
                'categoryAtt_id' => 'FC9CA0',
                'categoryAtt_name' => 'phr_allergies',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA1',
                'categoryAtt_name' => 'phr_specifyAllergies',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA2',
                'categoryAtt_name' => 'phr_PMH_Asthma',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA3',
                'categoryAtt_name' => 'phr_PMH_HTN',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA4',
                'categoryAtt_name' => 'phr_PMH_Thyroid',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA5',
                'categoryAtt_name' => 'phr_PMH_Diabetes',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA6',
                'categoryAtt_name' => 'phr_PMH_HepaticRenal',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA7',
                'categoryAtt_name' => 'phr_PMH_Tuberculosis',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA8',
                'categoryAtt_name' => 'phr_PMH_Psychiatric',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA9',
                'categoryAtt_name' => 'phr_PMH_CAD',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA10',
                'categoryAtt_name' => 'phr_PMH_CHF',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA11',
                'categoryAtt_name' => 'phr_PMH_otherIllness',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA12',
                'categoryAtt_name' => 'phr_PMH_specifyOtherIllness',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA13',
                'categoryAtt_name' => 'phr_specifyPrevHospitalization',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA14',
                'categoryAtt_name' => 'phr_maintenanceMeds',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA15',
                'categoryAtt_name' => 'phr_specifyMaintenanceMeds',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],











            [
                'categoryAtt_id' => 'FC10CA0',
                'categoryAtt_name' => 'phr_malignancy',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC10'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC10CA1',
                'categoryAtt_name' => 'phr_specifyMalignancy',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC10'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],











            [
                'categoryAtt_id' => 'FC11CA0',
                'categoryAtt_name' => 'phr_surgeries',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC11'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC11CA1',
                'categoryAtt_name' => 'phr_specifySurgeries',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC11'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],






            [
                'categoryAtt_id' => 'FC12CA0',
                'categoryAtt_name' => 'phr_tobacco',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA1',
                'categoryAtt_name' => 'phr_tobaccoPacks',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA2',
                'categoryAtt_name' => 'phr_tobaccoQuit',
                'categoryAtt_dataType' => 'date',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA3',
                'categoryAtt_name' => 'phr_recDrugs',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA4',
                'categoryAtt_name' => 'phr_specifyRecDrugs',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA5',
                'categoryAtt_name' => 'phr_alcohol',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA6',
                'categoryAtt_name' => 'phr_alcohol',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA7',
                'categoryAtt_name' => 'phr_alcoholDrinksFrequencyDay',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA8',
                'categoryAtt_name' => 'phr_alcoholDrinksFrequencyWeek',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA9',
                'categoryAtt_name' => 'phr_noOfAlcoholDrinks',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA10',
                'categoryAtt_name' => 'phr_vaccinationHistory',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],









            [
                'categoryAtt_id' => 'FC13CA0',
                'categoryAtt_name' => 'phr_specifyFamilialDisease',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC13'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC13CA1',
                'categoryAtt_name' => 'phr_specifyCivilStatus',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC13'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC13CA2',
                'categoryAtt_name' => 'phr_specifyPertinentHistory',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC13'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            



        ];

        phr_categoryAttributes::insert($categoryAtt);
    }
}
