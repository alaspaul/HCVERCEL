<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineSeeder extends Seeder
{
    public function run(): void
    {
        $medicines = [
            [
                'medicine_id' => '1',
                'medicine_name' => 'BABYHALER (GSK)',
                'medicine_brand' => '',
                'medicine_dosage' => '',
                'medicine_price' => 0.0,
                'medicine_type' => 'INHALER',
                
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => '2',
                'medicine_name' => 'BEARSE FC',
                'medicine_brand' => '',
                'medicine_dosage' => '',
                'medicine_price' => 0.0,
                'medicine_type' => 'TABLET',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => '3',
                'medicine_name' => 'CASTOR OIL',
                'medicine_brand' => '',
                'medicine_dosage' => '60ML',
                'medicine_price' => 0.0,
                'medicine_type' => 'BOTTLE',

                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        Medicine::insert($medicines);
    }
}

