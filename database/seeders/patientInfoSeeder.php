<?php

namespace Database\Seeders;

use App\Models\patient_info;
use Illuminate\Database\Seeder;

class patientInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $patientInfo = [   
            
            [
                'pInfo_id' => 'PI01', 'room_id' => 'RAA01', 'patient_id' => 'P01'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'pInfo_id' => 'PI02', 'room_id' => 'RAA02', 'patient_id' => 'P02'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'pInfo_id' => 'PI03', 'room_id' => 'RAA03', 'patient_id' => 'P03'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'pInfo_id' => 'PI04', 'room_id' => 'RAA04', 'patient_id' => 'P04'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       patient_info::insert($patientInfo);
    }
}
