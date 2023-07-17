<?php

namespace Database\Seeders;
use App\Models\resident_assigned_room;
use Illuminate\Database\Seeder;

class resAssRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        $ressAssRooms = [   
            
            [
                'resAssRoom_id' => 'RAR01', 'room_id' => 'RAA01', 'resident_id' => 'R01', 'isFinished' => '0'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'resAssRoom_id' => 'RAR02', 'room_id' => 'RAA02',  'resident_id' => 'R02', 'isFinished' => '0'

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'resAssRoom_id' => 'RAR03', 'room_id' => 'RAA03',  'resident_id' => 'R03', 'isFinished' => '0'

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'resAssRoom_id' => 'RAR04', 'room_id' => 'RAA04',  'resident_id' => 'R04', 'isFinished' => '0'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       resident_assigned_room::insert( $ressAssRooms);
        
    }
}
