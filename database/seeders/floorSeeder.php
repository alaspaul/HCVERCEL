<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\floor;

class floorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $floors = [   

            [
                'floor_id' => 'F1' , 'floor_name' => 'Annex A', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'floor_id' => 'F2' , 'floor_name' => 'Annex C1', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'floor_id' => 'F3' , 'floor_name' => 'Annex C2', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'floor_id' => 'F4' , 'floor_name' => 'Annex C3', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'floor_id' => 'F5' , 'floor_name' => 'Annex D1', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'floor_id' => 'F6' , 'floor_name' => 'Annex E', "created_at"=> now(), "updated_at"=> now()
            ],

       ];

       floor::insert($floors);

    }
}
