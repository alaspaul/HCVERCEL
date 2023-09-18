<?php

namespace Database\Seeders;

use App\Models\phr_formCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class formCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formCat = [   
            
            [
                'formCat_id' => 'FC0',
                'formCat_name' => 'Constitutional',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC1',
                'formCat_name' => 'ENT',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC2',
                'formCat_name' => 'Neck',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC3',
                'formCat_name' => 'Respiratory',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC4',
                'formCat_name' => 'Cardiovascular',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC5',
                'formCat_name' => 'Gastrointestinal',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC6',
                'formCat_name' => 'Genitourinary tract',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC7',
                'formCat_name' => 'Extremities',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC8',
                'formCat_name' => 'Skin',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC9',
                'formCat_name' => 'PastMedicalHistory',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC10',
                'formCat_name' => 'Malignancy',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC11',
                'formCat_name' => 'Surgeries',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC12',
                'formCat_name' => 'SocialHistory',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
            [
                'formCat_id' => 'FC13',
                'formCat_name' => 'FamilyHistory',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],            [
                'formCat_id' => 'FC14',
                'formCat_name' => 'Assesment',
                'formCat_description' => 'something'
                

                , 'created_at' => now(), 
                  'updated_at' => now(),
            ],
           
           
       ];

       phr_formCategories::insert($formCat);

    }
}
