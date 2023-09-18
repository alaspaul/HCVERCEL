<?php

namespace Database\Seeders;

use App\Models\phr_attributeValues;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class attributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributeVal = [ ];

        phr_attributeValues::insert($attributeVal);



    }
}
