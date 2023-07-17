<?php

namespace Database\Seeders;

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
        $residents = [   

            [
                'resident_id' => 'R01' ,
                'resident_userName' => 'userTest',
                'resident_fName' => 'fnameTest',
                'resident_lName' => 'lnameTest',
                'resident_mName' => 'mnameTest',
                'resident_password' => bcrypt(123),
                'department_id' => 'D01',
                'isChief' => 1,
                
                "created_at"=> now(), "updated_at"=> now()
            ],
            
            [
                'resident_id' => 'R02' ,
                'resident_userName' => 'userTest2',
                'resident_fName' => 'fnameTest',
                'resident_lName' => 'lnameTest',
                'resident_mName' => 'mnameTest',
                'resident_password' => bcrypt(123),
                'department_id' => 'D01',
                'isChief' => 1,
                
                "created_at"=> now(), "updated_at"=> now()
            ],

            [
                'resident_id' => 'R03' ,
                'resident_userName' => 'userTest3',
                'resident_fName' => 'fnameTest',
                'resident_lName' => 'lnameTest',
                'resident_mName' => 'mnameTest',
                'resident_password' => bcrypt(123),
                'department_id' => 'D01',
                'isChief' => 0,
                
                "created_at"=> now(), "updated_at"=> now()
            ],

            [
                'resident_id' => 'R04' ,
                'resident_userName' => 'userTest4',
                'resident_fName' => 'fnameTest',
                'resident_lName' => 'lnameTest',
                'resident_mName' => 'mnameTest',
                'resident_password' => bcrypt(123),
                'department_id' => 'D01',
                'isChief' => 0,
                
                "created_at"=> now(), "updated_at"=> now()
            ],

       ];

       resident::insert($residents);

    }
}
