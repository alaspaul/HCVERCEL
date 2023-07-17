<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\department;
class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = [   
            
            [
                'department_id' => 'D01', 'department_name' => 'dept of Internal Medicine'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'department_id' => 'D02', 'department_name' => 'dept of Family and Community Medicine'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'department_id' => 'D03', 'department_name' => 'Dept of Obstetrics and Gynecology'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'department_id' => 'D04', 'department_name' => 'Dept of Pediatrics'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'department_id' => 'D05', 'department_name' => 'Dept of General Surgery'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       department::insert($department);


    
    }
}
