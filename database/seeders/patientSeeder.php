<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\patient;

class patientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = [   
            
            [
                'patient_id' => 'P01', 'patient_fName'=> 'Paul Irvin', 'patient_lName' => 'Alas', 'patient_mName' => 'Estremos', 'patient_age' => '22', 'patient_sex' => 'M', 'patient_vaccination_stat' => 'pfizer 2x', 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'patient_id' => 'P02', 'patient_fName'=> 'Gabriel', 'patient_lName' => 'Tejana', 'patient_mName' => 'null', 'patient_age' => '22', 'patient_sex' => 'M', 'patient_vaccination_stat' => 'pfizer 1x', 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'patient_id' => 'P03', 'patient_fName'=> 'Angelo Louise', 'patient_lName' => 'Baricuatro', 'patient_mName' => 'null', 'patient_age' => '22', 'patient_sex' => 'M', 'patient_vaccination_stat' => 'pfizer 2x', 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'patient_id' => 'P04', 'patient_fName'=> 'Christian', 'patient_lName' => 'Morales', 'patient_mName' => 'null', 'patient_age' => '22', 'patient_sex' => 'M', 'patient_vaccination_stat' => 'pfizer 1x', 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       patient::insert($patient);
    }
}
