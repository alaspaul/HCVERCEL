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
                'resident_id' =>  $date->year . 'D1' . 'R5' ,
                'resident_userName' => 'userTests',
                'resident_fName' => 'fnameTest',
                'resident_lName' => 'lnameTest',
                'resident_mName' => 'mnameTest',
                'resident_password' => bcrypt(123),
                'department_id' => 'D1',
                'isChief' => 1,
                
                "created_at"=> now(), "updated_at"=> now()
            ],
            
            [
                'resident_id' =>  $date->year . 'D1' . 'R6' ,
                'resident_userName' => 'userTest2s',
                'resident_fName' => 'fnameTest',
                'resident_lName' => 'lnameTest',
                'resident_mName' => 'mnameTest',
                'resident_password' => bcrypt(123),
                'department_id' => 'D1',
                'isChief' => 1,
                
                "created_at"=> now(), "updated_at"=> now()
            ],

            [
                'resident_id' =>  $date->year . 'D1' . 'R7' ,
                'resident_userName' => 'userTest3s',
                'resident_fName' => 'fnameTest',
                'resident_lName' => 'lnameTest',
                'resident_mName' => 'mnameTest',
                'resident_password' => bcrypt(123),
                'department_id' => 'D1',
                'isChief' => 0,
                
                "created_at"=> now(), "updated_at"=> now()
            ],

            [
                'resident_id' =>  $date->year . 'D1' . 'R8' ,
                'resident_userName' => 'userTest4s',
                'resident_fName' => 'fnameTest',
                'resident_lName' => 'lnameTest',
                'resident_mName' => 'mnameTest',
                'resident_password' => bcrypt(123),
                'department_id' => 'D1',
                'isChief' => 0,
                
                "created_at"=> now(), "updated_at"=> now()
            ],

       ];

       resident::insert($residents);

    }
}
