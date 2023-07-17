<?php

namespace Database\Seeders;

use App\Models\patient_history;
use Illuminate\Database\Seeder;

class patientHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pHistory = [   
            
            [
                'patientHistory_id' => 'PH01', 'history_id' => 'H01', 'patient_id' => 'P01'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'patientHistory_id' => 'PH02', 'history_id' => 'H02', 'patient_id' => 'P02'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'patientHistory_id' => 'PH03', 'history_id' => 'H03', 'patient_id' => 'P03'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'patientHistory_id' => 'PH04', 'history_id' => 'H04', 'patient_id' => 'P04'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       patient_history::insert($pHistory);
    }
}
