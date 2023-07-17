<?php

namespace Database\Seeders;

use App\Models\history;
use Illuminate\Database\Seeder;

class historySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $history = [   
            
            [
                'history_id' => 'H01'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'history_id' => 'H02'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'history_id' => 'H03'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'history_id' => 'H04'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       history::insert($history);
    }
}

