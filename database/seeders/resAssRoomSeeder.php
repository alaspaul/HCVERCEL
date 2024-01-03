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
                'resAssRoom_id' => 'RAR1', 'room_id' => 'RAA1', 'resident_id' => '2023D1R1', 'isFinished' => '0'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'resAssRoom_id' => 'RAR2', 'room_id' => 'RAA2',  'resident_id' => '2023D1R2', 'isFinished' => '0'

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'resAssRoom_id' => 'RAR3', 'room_id' => 'RAA3',  'resident_id' => '2023D1R3', 'isFinished' => '0'

                , 'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'resAssRoom_id' => 'RAR4', 'room_id' => 'RAA4',  'resident_id' => '2023D1R4', 'isFinished' => '0'
                

                , 'created_at' => now(), 'updated_at' => now(),
            ],

       ];

       resident_assigned_room::insert( $ressAssRooms);
        
    }
}
