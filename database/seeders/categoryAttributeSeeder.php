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
                'categoryAtt_returnName' => 'Blood Pressure (Sitting)',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA1',
                'categoryAtt_name' => 'phr_bpStanding',
                'categoryAtt_returnName' => 'Blood Pressure (Standing)',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA2',
                'categoryAtt_name' => 'phr_bpLying',
                'categoryAtt_returnName' => 'Blood Pressure (Lying)',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA3',
                'categoryAtt_name' => 'phr_hrRegular',
                'categoryAtt_returnName' => 'Heart Rate (Regular)',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA4',
                'categoryAtt_name' => 'phr_hrIrregular',
                'categoryAtt_returnName' => 'Heart Rate (Irregular)',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA5',
                'categoryAtt_name' => 'phr_rr',
                'categoryAtt_returnName' => 'Respiratory Rate',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA6',
                'categoryAtt_name' => 'phr_T*',
                'categoryAtt_returnName' => 'Temperature',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC0CA7',
                'categoryAtt_name' => 'phr_Sp-02',
                'categoryAtt_returnName' => 'Oxygen saturation',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC0'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],









            [
                'categoryAtt_id' => 'FC1CA0',
                'categoryAtt_name' => 'phr_nasalMucosaSeptumTurbinatesWNL',
                'categoryAtt_returnName' => 'NasalMucosa Septum Turbinates WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA1',
                'categoryAtt_name' => 'phr_nasalMucosaSeptumTurbinatesEdeOrEryPresent',
                'categoryAtt_returnName' => 'NasalMucosa Septum Turbinates Ede Or Ery Present',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA2',
                'categoryAtt_name' => 'phr_dentionAndGumsWNL',
                'categoryAtt_returnName' => 'Dentition And Gums WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA3',
                'categoryAtt_name' => 'phr_dentionAndGumsDentalCanes',
                'categoryAtt_returnName' => 'Dentition And Gums DentalCanes',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA4',
                'categoryAtt_name' => 'phr_dentionAndGumsGingivitis',
                'categoryAtt_returnName' => 'Dentition And Gums Gingivitis',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA5',
                'categoryAtt_name' => 'phr_oropharynxWNL',
                'categoryAtt_returnName' => 'Oropharynx WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA6',
                'categoryAtt_name' => 'phr_oropharynxEdeOrEryPresent',
                'categoryAtt_returnName' => 'Oropharynx Ede Or Ery Present',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA7',
                'categoryAtt_name' => 'phr_oropharynxOralUlcers',
                'categoryAtt_returnName' => 'Oropharynx Oral Ulcers',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA8',
                'categoryAtt_name' => 'phr_oropharynxOralPetachie',
                'categoryAtt_returnName' => 'Oropharynx Oral Petachie',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA9',
                'categoryAtt_name' => 'phr_mallampati1',
                'categoryAtt_returnName' => 'Mallampati 1',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA10',
                'categoryAtt_name' => 'phr_mallampati2',
                'categoryAtt_returnName' => 'Mallampati 2',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA11',
                'categoryAtt_name' => 'phr_mallampati3',
                'categoryAtt_returnName' => 'Mallampati 3',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC1CA12',
                'categoryAtt_name' => 'phr_mallampati4',
                'categoryAtt_returnName' => 'Mallampati 4',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC1'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],










            [
                'categoryAtt_id' => 'FC2CA0',
                'categoryAtt_name' => 'phr_neckWNL',
                'categoryAtt_returnName' => 'Neck WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA1',
                'categoryAtt_name' => 'phr_neckLymphadenopathy',
                'categoryAtt_returnName' => 'Neck Lymphadenopathy',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA2',
                'categoryAtt_name' => 'phr_thyroidWNL',
                'categoryAtt_returnName' => 'Thyroid WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA3',
                'categoryAtt_name' => 'phr_thyroidThyromegaly',
                'categoryAtt_returnName' => 'Thyroid Thyromegaly',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA4',
                'categoryAtt_name' => 'phr_thyroidNodulesPalpable',
                'categoryAtt_returnName' => 'Thyroid Nodules Palpable',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA5',
                'categoryAtt_name' => 'phr_thyroidNeckMass',
                'categoryAtt_returnName' => 'Thyroid Neck Mass',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA6',
                'categoryAtt_name' => 'phr_jugularVeinsWNL',
                'categoryAtt_returnName' => 'JugularVeins WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC2CA7',
                'categoryAtt_name' => 'phr_jugularVeinsEngorged',
                'categoryAtt_returnName' => 'JugularVeins Engorged',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC2'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],







            [
                'categoryAtt_id' => 'FC3CA0',
                'categoryAtt_name' => 'phr_chestExpansionAndSymmetrical',
                'categoryAtt_returnName' => 'ChestExpansion And Symmetrical',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA1',
                'categoryAtt_name' => 'phr_respiratoryEffortWNL',
                'categoryAtt_returnName' => 'Respiratory Effort WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA2',
                'categoryAtt_name' => 'phr_respiratoryEffortAccessoryMuscleUse',
                'categoryAtt_returnName' => 'Respiratory Effort AccessoryMuscle Use',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA3',
                'categoryAtt_name' => 'phr_respiratoryEffortIntercostalRetractions',
                'categoryAtt_returnName' => 'Respiratory Effort IntercostalRetractions',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA4',
                'categoryAtt_name' => 'phr_respiratoryEffortParadoxicMovements',
                'categoryAtt_returnName' => 'Respiratory Effort Paradoxic Movements',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA5',
                'categoryAtt_name' => 'phr_tactileFremitusWNL',
                'categoryAtt_returnName' => 'Tactile Fremitus WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
            

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA6',
                'categoryAtt_name' => 'phr_tactileFremitusIncreased',
                'categoryAtt_returnName' => 'Tactile Fremitus Increased',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA7',
                'categoryAtt_name' => 'phr_tactileFremitusDecreased',
                'categoryAtt_returnName' => 'Tactile Fremitus Decreased',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA8',
                'categoryAtt_name' => 'phr_chestPercussionWNL',
                'categoryAtt_returnName' => 'Chest Percussion WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA9',
                'categoryAtt_name' => 'phr_chestPercussionDullnessToPercussion',
                'categoryAtt_returnName' => 'Chest Percussion Dullness To Percussion',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA10',
                'categoryAtt_name' => 'phr_chestPercussionHyperResonance',
                'categoryAtt_returnName' => 'Chest Percussion HyperResonance',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA11',
                'categoryAtt_name' => 'phr_AuscultationWNL',
                'categoryAtt_returnName' => 'Auscultation WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA12',
                'categoryAtt_name' => 'phr_AuscultationBronchialBreathSounds',
                'categoryAtt_returnName' => 'Auscultation Bronchial BreathSounds',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA13',
                'categoryAtt_name' => 'phr_AuscultationEgophony',
                'categoryAtt_returnName' => 'Auscultation Egophony',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA14',
                'categoryAtt_name' => 'phr_AuscultationRhonchi',
                'categoryAtt_returnName' => 'Auscultation Rhonchi',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA15',
                'categoryAtt_name' => 'phr_AuscultationRales',
                'categoryAtt_returnName' => 'Auscultation Rales',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA16',
                'categoryAtt_name' => 'phr_AuscultationWheezes',
                'categoryAtt_returnName' => 'Auscultation Wheezes',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA17',
                'categoryAtt_name' => 'phr_AuscultationRub',
                'categoryAtt_returnName' => 'Auscultation Rub',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC3CA18',
                'categoryAtt_name' => 'phr_RespiratoryAdditionalFindings',
                'categoryAtt_returnName' => 'Respiratory Additional Findings',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC3'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],







            [
                'categoryAtt_id' => 'FC4CA0',
                'categoryAtt_name' => 'phr_heartSoundsClearS1',
                'categoryAtt_returnName' => 'Heart Sounds Clear S1',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA1',
                'categoryAtt_name' => 'phr_heartSoundsClearS2',
                'categoryAtt_returnName' => 'Heart Sounds Clear S2',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA2',
                'categoryAtt_name' => 'phr_heartSoundsNoMurmur',
                'categoryAtt_returnName' => 'Heart Sounds No Murmur',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA3',
                'categoryAtt_name' => 'phr_heartSoundsGallopAudible',
                'categoryAtt_returnName' => 'Heart Sounds Gallop Audible',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA4',
                'categoryAtt_name' => 'phr_heartSoundsRubAudible',
                'categoryAtt_returnName' => 'Heart Sounds Rub Audible',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA5',
                'categoryAtt_name' => 'phr_heartSoundsMurmursPresent',
                'categoryAtt_returnName' => 'Heart Sounds Murmurs Present',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA6',
                'categoryAtt_name' => 'phr_heartSoundsSystolic',
                'categoryAtt_returnName' => 'Heart Sounds Systolic',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA7',
                'categoryAtt_name' => 'phr_heartSoundsDiastolic',
                'categoryAtt_returnName' => 'Heart Sounds Diastolic',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA8',
                'categoryAtt_name' => 'phr_grade',
                'categoryAtt_returnName' => 'Grade',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC4CA9',
                'categoryAtt_name' => 'phr_CardiovascularAdditionalFindings',
                'categoryAtt_returnName' => 'Cardiovascular Additional Findings',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC4'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],


        




            [
                'categoryAtt_id' => 'FC5CA0',
                'categoryAtt_name' => 'phr_abdomenWNL',
                'categoryAtt_returnName' => 'Abdomen WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA1',
                'categoryAtt_name' => 'phr_massPresent',
                'categoryAtt_returnName' => 'Mass Present',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA2',
                'categoryAtt_name' => 'phr_specifyMassPresent',
                'categoryAtt_returnName' => 'Specify Mass Present',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA3',
                'categoryAtt_name' => 'phr_bowelSoundsNormaoactive',
                'categoryAtt_returnName' => 'Bowel Sounds Normaoactive',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA4',
                'categoryAtt_name' => 'phr_bowelSoundsUp',
                'categoryAtt_returnName' => 'Bowel Sounds Up',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA5',
                'categoryAtt_name' => 'phr_bowelSoundsDown',
                'categoryAtt_returnName' => 'Bowel Sounds Down',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA6',
                'categoryAtt_name' => 'phr_unableToPalpateLiver',
                'categoryAtt_returnName' => 'Unable To Palpate Liver',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA7',
                'categoryAtt_name' => 'phr_unableToPalpateSpleen',
                'categoryAtt_returnName' => 'Unable To Palpate Spleen',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA8',
                'categoryAtt_name' => 'phr_organomegalyLiver',
                'categoryAtt_returnName' => 'Organomegaly Liver',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA9',
                'categoryAtt_name' => 'phr_organomegalySpleen',
                'categoryAtt_returnName' => 'Organomegaly Spleen',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC5CA10',
                'categoryAtt_name' => 'phr_DREFindings',
                'categoryAtt_returnName' => 'DRE Findings',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC5'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],







            [
                'categoryAtt_id' => 'FC6CA0',
                'categoryAtt_name' => 'phr_kidneyPunchSignNegative',
                'categoryAtt_returnName' => 'Kidney Punch Sign Negative',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC6'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC6CA1',
                'categoryAtt_name' => 'phr_kidneyPunchSignPositive',
                'categoryAtt_returnName' => 'Kidney Punch Sign Positives',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC6'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC6CA2',
                'categoryAtt_name' => 'phr_IfPositiveR',
                'categoryAtt_returnName' => 'If Positive R',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC6'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC6CA3',
                'categoryAtt_name' => 'phr_IfPositiveL',
                'categoryAtt_returnName' => 'If Positive L',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC6'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],









            [
                'categoryAtt_id' => 'FC7CA0',
                'categoryAtt_name' => 'phr_extremitiesWNL',
                'categoryAtt_returnName' => 'Extremities WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC7'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC7CA1',
                'categoryAtt_name' => 'phr_extremitiesClubbing',
                'categoryAtt_returnName' => 'Extremities Clubbing',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC7'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC7CA2',
                'categoryAtt_name' => 'phr_extremitiesCyanosis',
                'categoryAtt_returnName' => 'Extremities Cyanosis',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC7'
            

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC7CA3',
                'categoryAtt_name' => 'phr_extremitiesPetachiae',
                'categoryAtt_returnName' => 'Extremities Petachiae',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC7'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC7CA4',
                'categoryAtt_name' => 'phr_capillaryRefillTime',
                'categoryAtt_returnName' => 'Capillary Refill Time',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC7'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],








            [
                'categoryAtt_id' => 'FC8CA0',
                'categoryAtt_name' => 'phr_skinWNL',
                'categoryAtt_returnName' => 'Skin WNL',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC8CA1',
                'categoryAtt_name' => 'phr_skinRash',
                'categoryAtt_returnName' => 'Skin Rash',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC8CA2',
                'categoryAtt_name' => 'phr_skinEccymosis',
                'categoryAtt_returnName' => 'Skin Eccymosis',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC8CA3',
                'categoryAtt_name' => 'phr_skinNodules',
                'categoryAtt_returnName' => 'Skin Nodules',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC8CA4',
                'categoryAtt_name' => 'phr_skinUlcer',
                'categoryAtt_returnName' => 'Skin Ulcer',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC8'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],








            [
                'categoryAtt_id' => 'FC9CA0',
                'categoryAtt_name' => 'phr_allergies',
                'categoryAtt_returnName' => 'Allergies',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA1',
                'categoryAtt_name' => 'phr_specifyAllergies',
                'categoryAtt_returnName' => 'Specify Allergies',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA2',
                'categoryAtt_name' => 'phr_PMH_Asthma',
                'categoryAtt_returnName' => 'PMH Asthma',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA3',
                'categoryAtt_name' => 'phr_PMH_HTN',
                'categoryAtt_returnName' => 'PMH HTN',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA4',
                'categoryAtt_name' => 'phr_PMH_Thyroid',
                'categoryAtt_returnName' => 'PMH Thyroid',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA5',
                'categoryAtt_name' => 'phr_PMH_Diabetes',
                'categoryAtt_returnName' => 'PMH Diabetes',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA6',
                'categoryAtt_name' => 'phr_PMH_HepaticRenal',
                'categoryAtt_returnName' => 'PMH HepaticRenal',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA7',
                'categoryAtt_name' => 'phr_PMH_Tuberculosis',
                'categoryAtt_returnName' => 'PMH Tuberculosis',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA8',
                'categoryAtt_name' => 'phr_PMH_Psychiatric',
                'categoryAtt_returnName' => 'PMH Psychiatric',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA9',
                'categoryAtt_name' => 'phr_PMH_CAD',
                'categoryAtt_returnName' => 'PMH CAD',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA10',
                'categoryAtt_name' => 'phr_PMH_CHF',
                'categoryAtt_returnName' => 'PMH CHF',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA11',
                'categoryAtt_name' => 'phr_PMH_otherIllness',
                'categoryAtt_returnName' => 'PMH OtherIllness',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA12',
                'categoryAtt_name' => 'phr_PMH_specifyOtherIllness',
                'categoryAtt_returnName' => 'PMH Specify Other Illness',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA13',
                'categoryAtt_name' => 'phr_specifyPrevHospitalization',
                'categoryAtt_returnName' => 'Specify Previous Hospitalization',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA14',
                'categoryAtt_name' => 'phr_maintenanceMeds',
                'categoryAtt_returnName' => 'Maintenance Meds',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC9CA15',
                'categoryAtt_name' => 'phr_specifyMaintenanceMeds',
                'categoryAtt_returnName' => 'Specify Maintenance Meds',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC9'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],











            [
                'categoryAtt_id' => 'FC10CA0',
                'categoryAtt_name' => 'phr_malignancy',
                'categoryAtt_returnName' => 'Malignancy',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC10'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC10CA1',
                'categoryAtt_name' => 'phr_specifyMalignancy',
                'categoryAtt_returnName' => 'Specify Malignancy',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC10'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],











            [
                'categoryAtt_id' => 'FC11CA0',
                'categoryAtt_name' => 'phr_surgeries',
                'categoryAtt_returnName' => 'Surgeries',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC11'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC11CA1',
                'categoryAtt_name' => 'phr_specifySurgeries',
                'categoryAtt_returnName' => 'Specify Surgeries',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC11'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],






            [
                'categoryAtt_id' => 'FC12CA0',
                'categoryAtt_name' => 'phr_tobacco',
                'categoryAtt_returnName' => 'Tobacco',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA1',
                'categoryAtt_name' => 'phr_tobaccoPacks',
                'categoryAtt_returnName' => 'Tobacco Packs',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA2',
                'categoryAtt_name' => 'phr_tobaccoQuit',
                'categoryAtt_returnName' => 'Tobacco Quit',
                'categoryAtt_dataType' => 'date',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA3',
                'categoryAtt_name' => 'phr_recDrugs',
                'categoryAtt_returnName' => 'Recreational Drugs',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA4',
                'categoryAtt_name' => 'phr_specifyRecDrugs',
                'categoryAtt_returnName' => 'Specify Recreational Drugs',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA5',
                'categoryAtt_name' => 'phr_alcohol',
                'categoryAtt_returnName' => 'Alcohol',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA6',
                'categoryAtt_name' => 'phr_alcoholDrinksFrequencyDay',
                'categoryAtt_returnName' => 'Alcohol Drinks Frequency per Day',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA7',
                'categoryAtt_name' => 'phr_alcoholDrinksFrequencyWeek',
                'categoryAtt_returnName' => 'Alcohol Drinks Frequency per Week',
                'categoryAtt_dataType' => 'boolean',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC12CA8',
                'categoryAtt_name' => 'phr_noOfAlcoholDrinks',
                'categoryAtt_returnName' => 'Number Of Alcohol Drinks',
                'categoryAtt_dataType' => 'integer',
                'formCat_id' => 'FC12'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],









            [
                'categoryAtt_id' => 'FC13CA0',
                'categoryAtt_name' => 'phr_specifyFamilialDisease',
                'categoryAtt_returnName' => 'Specify Familial Diseases',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC13'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC13CA1',
                'categoryAtt_name' => 'phr_specifyCivilStatus',
                'categoryAtt_returnName' => 'Specify Civil Status',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC13'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'categoryAtt_id' => 'FC13CA2',
                'categoryAtt_name' => 'phr_specifyPertinentHistory',
                'categoryAtt_returnName' => 'Specify Pertinent History',
                'categoryAtt_dataType' => 'text',
                'formCat_id' => 'FC13'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
              'categoryAtt_id' => 'FC13CA3',
              'categoryAtt_name' => 'phr_historyOfPresentIllness',
              'categoryAtt_returnName' => 'History Of Present Illness',
              'categoryAtt_dataType' => 'text',
              'formCat_id' => 'FC13'
              

              , 'created_at' => now(), 
                'updated_at' => now(),
          ],
          [
            'categoryAtt_id' => 'FC13CA4',
            'categoryAtt_name' => 'phr_HxFromParent',
            'categoryAtt_returnName' => 'Hx From Parent',
            'categoryAtt_dataType' => 'text',
            'formCat_id' => 'FC13'
            

            , 'created_at' => now(), 
              'updated_at' => now(),
          ],
          [
          'categoryAtt_id' => 'FC13CA5',
          'categoryAtt_name' => 'phr_HxFromFamily',
          'categoryAtt_returnName' => 'Hx From Family',
          'categoryAtt_dataType' => 'text',
          'formCat_id' => 'FC13'
          

          , 'created_at' => now(), 
            'updated_at' => now(),
          ],






          [
          'categoryAtt_id' => 'FC14CA0',
          'categoryAtt_name' => 'phr_nonVerbalPatient',
          'categoryAtt_returnName' => 'Non Verbal Patient',
          'categoryAtt_dataType' => 'text',
          'formCat_id' => 'FC14'
          

          , 'created_at' => now(), 
            'updated_at' => now(),
          ],
           [
          'categoryAtt_id' => 'FC14CA1',
          'categoryAtt_name' => 'phr_endTime',
          'categoryAtt_returnName' => 'End Time',
          'categoryAtt_dataType' => 'text',
          'formCat_id' => 'FC14'
          

          , 'created_at' => now(), 
            'updated_at' => now(),
          ],
          [
            'categoryAtt_id' => 'FC14CA2',
            'categoryAtt_name' => 'phr_startTime',
            'categoryAtt_returnName' => 'Start Time',
            'categoryAtt_dataType' => 'text',
            'formCat_id' => 'FC14'
            
  
            , 'created_at' => now(), 
              'updated_at' => now(),
            ],
            [
              'categoryAtt_id' => 'FC14CA3',
              'categoryAtt_name' => 'phr_chiefComplaint',
              'categoryAtt_returnName' => 'Chief Complaint',
              'categoryAtt_dataType' => 'text',
              'formCat_id' => 'FC14'
              
    
              , 'created_at' => now(), 
                'updated_at' => now(),
              ],
            
            



        ];

        phr_categoryAttributes::insert($categoryAtt);
    }
}
