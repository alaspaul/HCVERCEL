<?php

namespace Database\Seeders;

use App\Models\patientAssignedRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class patAssRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
            $PAR = [   
                
                [
                    'patAssRoom_id' => 'PAR01', 'dateAdmitted' => now(), 'room_id' => 'RAA01', 'patient_id' => 'P01'
                    
    
                    , 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'patAssRoom_id' => 'PAR02', 'dateAdmitted' => now(), 'room_id' => 'RAA02', 'patient_id' => 'P02'
                    
    
                    , 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'patAssRoom_id' => 'PAR03', 'dateAdmitted' => now(), 'room_id' => 'RAA04', 'patient_id' => 'P03'
                    
    
                    , 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'patAssRoom_id' => 'PAR04', 'dateAdmitted' => now(), 'room_id' => 'RAA04', 'patient_id' => 'P04'
                    
    
                    , 'created_at' => now(), 'updated_at' => now(),
                ],

    
           ];
    
           patientAssignedRoom::insert($PAR);
    }
}
