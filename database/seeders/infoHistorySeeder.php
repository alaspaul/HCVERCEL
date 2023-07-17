<?php

namespace Database\Seeders;

use App\Models\info_history;

use Illuminate\Database\Seeder;

class infoHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iHistory = [   
            
            [
                'infoHistory_id' => 'IH01', 'history_id' => 'H01', 'pInfo_id' => 'PI01'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'infoHistory_id' => 'IH02', 'history_id' => 'H02', 'pInfo_id' => 'PI02'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'infoHistory_id' => 'IH03', 'history_id' => 'H03', 'pInfo_id' => 'PI03'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'infoHistory_id' => 'IH04', 'history_id' => 'H04', 'pInfo_id' => 'PI04'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       info_history::insert($iHistory);
    }
}
