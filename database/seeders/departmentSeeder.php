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
                'department_id' => 'D1', 'department_name' => 'Department of Internal Medicine'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'department_id' => 'D2', 'department_name' => 'Department of Family and Community Medicine'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'department_id' => 'D3', 'department_name' => 'Department of Obstetrics and Gynecology'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'department_id' => 'D4', 'department_name' => 'Department of Pediatrics'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'department_id' => 'D5', 'department_name' => 'Department of General Surgery'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       department::insert($department);


    
    }
}
