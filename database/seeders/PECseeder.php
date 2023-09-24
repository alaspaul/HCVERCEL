<?php

namespace Database\Seeders;

use App\Models\physicalExam_categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PECseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  $PEC = [   

        [
            'physicalExam_id' => 'PE0', 
            'PE_name' => 'HEAD',  
            'PE_description' => 'ALL PARTS OF THE HEAD', 

            'created_at' => now(), 'updated_at' => now(),
        ],
        [
            'physicalExam_id' => 'PE1', 
            'PE_name' => 'BODY',  
            'PE_description' => 'ALL PARTS OF THE BODY', 

            'created_at' => now(), 'updated_at' => now(),
        ],
        [
            'physicalExam_id' => 'PE2', 
            'PE_name' => 'LEGS',  
            'PE_description' => 'ALL PARTS OF THE LEGS', 

            'created_at' => now(), 'updated_at' => now(),
        ],
        [
            'physicalExam_id' => 'PE3', 
            'PE_name' => 'ARMS',  
            'PE_description' => 'ALL PARTS OF THE ARMS', 

            'created_at' => now(), 'updated_at' => now(),
        ],
     


   ];

   physicalExam_categories::insert( $PEC);

    }
}
