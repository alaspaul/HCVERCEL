<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\resident;

class residentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time = now();
        $date = new Carbon( $time ); 


        $residents = [   

            [
                'resident_id' =>  $date->year . 'D1' . 'R1' ,
                'resident_userName' => 'userTests',
                'resident_fName' => 'Paul Irvin',
                'resident_lName' => 'Alas',
                'resident_mName' => 'Estremos',
                'resident_gender' => 'Male',
                'resident_password' => bcrypt(123),
                'department_id' => 'D1',
                'role' => 'chiefResident',
                
                "created_at"=> now(), "updated_at"=> now()
            ],
            
            [
                'resident_id' =>  $date->year . 'D1' . 'R2' ,
                'resident_userName' => 'userTest2s',
                'resident_fName' => 'Gabriel',
                'resident_lName' => 'Tejana',
                'resident_mName' => 'Magallo',
                'resident_gender' => 'Male',
                'resident_password' => bcrypt(123),
                'department_id' => 'D1',
                'role' => 'chiefResident',
                
                "created_at"=> now(), "updated_at"=> now()
            ],

            [
                'resident_id' =>  $date->year . 'D1' . 'R3' ,
                'resident_userName' => 'userTest3s',
                'resident_fName' => 'Angelo Louis',
                'resident_lName' => 'Baricuatro',
                'resident_mName' => 'camomot',
                'resident_gender' => 'Male',
                'resident_password' => bcrypt(123),
                'department_id' => 'D1',
                'role' => 'resident',
                
                "created_at"=> now(), "updated_at"=> now()
            ],

            [
                'resident_id' =>  $date->year . 'D1' . 'R4' ,
                'resident_userName' => 'userTest4s',
                'resident_fName' => 'Christian paul',
                'resident_lName' => 'Mandawe',
                'resident_mName' => 'talis',
                'resident_gender' => 'Male',
                'resident_password' => bcrypt(123),
                'department_id' => 'D1',
                'role' => 'resident',
                
                "created_at"=> now(), "updated_at"=> now()
            ],

       ];

       resident::insert($residents);

    }
}

