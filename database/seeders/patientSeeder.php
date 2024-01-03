<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class patientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    { 
        
        $time = now();
        $date = new Carbon($time);

        $patient = [   

        [
            'patient_id' => $date->year . 'P1' ,
            'patient_fName' => 'paul irvin',
            'patient_lName' => 'alas',
            'patient_mName' => 'estremos',
            'patient_age' => 22,
            'patient_sex' => 'M',




            "created_at"=> now(),
            "updated_at"=> now()
        ],
        [
            'patient_id' => $date->year . 'P2' ,
            'patient_fName' => 'Gabriel',
            'patient_lName' => 'tejana',
            'patient_mName' => 'estremos',
            'patient_age' => 22,
            'patient_sex' => 'M',




            "created_at"=> now(),
            "updated_at"=> now()
        ],
        [
            'patient_id' => $date->year . 'P3' ,
            'patient_fName' => 'Angelo',
            'patient_lName' => 'baricuatro',
            'patient_mName' => 'estremos',
            'patient_age' => 22,
            'patient_sex' => 'M',




            "created_at"=> now(),
            "updated_at"=> now()
        ],
        [
            'patient_id' => $date->year . 'P4' ,
            'patient_fName' => 'paopao',
            'patient_lName' => 'sabidge',
            'patient_mName' => 'estremos',
            'patient_age' => 22,
            'patient_sex' => 'M',




            "created_at"=> now(),
            "updated_at"=> now()
        ],
        

   ];

   Patient::insert($patient);

    
    }
}
