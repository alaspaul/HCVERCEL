<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\room;

class roomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [   
            
            [
                'room_id' => 'RAA01' , 'room_name' => 'Room 1', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA02' , 'room_name' => 'Room 2', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA03' , 'room_name' => 'Room 3', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA04' , 'room_name' => 'Room 4', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA05' , 'room_name' => 'Room 5', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA06' , 'room_name' => 'Room 6', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA07' , 'room_name' => 'Room 7', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA08' , 'room_name' => 'Room 8', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA09' , 'room_name' => 'Room 9', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA10' , 'room_name' => 'Room 10', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA11' , 'room_name' => 'Room 11', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA12' , 'room_name' => 'Room 12', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA13' , 'room_name' => 'Room 13', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA14' , 'room_name' => 'Room 14', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA15' , 'room_name' => 'Room 15', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA16' , 'room_name' => 'Room 16', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA17' , 'room_name' => 'Room 17', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA18' , 'room_name' => 'Room 18', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA19' , 'room_name' => 'Room 19', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA20' , 'room_name' => 'Room 20', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA21' , 'room_name' => 'Room 21', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA22' , 'room_name' => 'Room 22', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA23' , 'room_name' => 'Room 23', 'room_building' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],







            [
                'room_id' => 'RAB01' , 'room_name' => 'Room 1', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB02' , 'room_name' => 'Room 2', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB03' , 'room_name' => 'Room 3', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB04' , 'room_name' => 'Room 4', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB05' , 'room_name' => 'Room 5', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB06' , 'room_name' => 'Room 6', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB07' , 'room_name' => 'Room 7', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB08' , 'room_name' => 'Room 8', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB09' , 'room_name' => 'Room 9', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB10' , 'room_name' => 'Room 10', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB11' , 'room_name' => 'Room 11', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB12' , 'room_name' => 'Room 12', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB13' , 'room_name' => 'Room 13', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB14' , 'room_name' => 'Room 14', 'room_building' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],








            [
                'room_id' => 'RAC101' , 'room_name' => 'Room 1', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC102' , 'room_name' => 'Room 2', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC103' , 'room_name' => 'Room 3', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC104' , 'room_name' => 'Room 4', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC105' , 'room_name' => 'Room 5', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC106' , 'room_name' => 'Room 6', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC107' , 'room_name' => 'Room 7', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC108' , 'room_name' => 'Room 8', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC109' , 'room_name' => 'Room 9', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC110' , 'room_name' => 'Room 10', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC111' , 'room_name' => 'Room 11', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC112' , 'room_name' => 'Room 12', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC113' , 'room_name' => 'Room 13', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC114' , 'room_name' => 'Room 14', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC115' , 'room_name' => 'Room 15', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC116' , 'room_name' => 'Room 16', 'room_building' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],





            [
                'room_id' => 'RAC201' , 'room_name' => 'Room 1', 'room_building' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC202' , 'room_name' => 'Room 2', 'room_building' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC203' , 'room_name' => 'Room 3', 'room_building' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC204' , 'room_name' => 'Room 4', 'room_building' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC205' , 'room_name' => 'Room 5', 'room_building' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC206' , 'room_name' => 'Room 6', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC207' , 'room_name' => 'Room 7', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC208' , 'room_name' => 'Room 8', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC209' , 'room_name' => 'Room 9', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC210' , 'room_name' => 'Room 10', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC211' , 'room_name' => 'Room 11', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC212' , 'room_name' => 'Room 12', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC213' , 'room_name' => 'Room 13', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC214' , 'room_name' => 'Room 14', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC215' , 'room_name' => 'Room 15', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC216' , 'room_name' => 'Room 16', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC217' , 'room_name' => 'Room 17', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC218' , 'room_name' => 'Room 18', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC219' , 'room_name' => 'Room 19', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC220' , 'room_name' => 'Room 20', 'room_building' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],


            [
                'room_id' => 'RAC301' , 'room_name' => 'room 1 - A', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC302' , 'room_name' => 'room 1 - B', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC303' , 'room_name' => 'room 1 - C', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC304' , 'room_name' => 'room 2', 'room_building' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC305' , 'room_name' => 'room 3', 'room_building' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC306' , 'room_name' => 'room 4 - A', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC307' , 'room_name' => 'room 4 - B', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC308' , 'room_name' => 'room 4 - C', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC309' , 'room_name' => 'room 5 - A', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC310' , 'room_name' => 'room 5 - B', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC311' , 'room_name' => 'room 5 - C', 'room_building' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC312' , 'room_name' => 'room 6', 'room_building' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC313' , 'room_name' => 'room 7', 'room_building' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC314' , 'room_name' => 'room 8', 'room_building' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC315' , 'room_name' => 'room 9', 'room_building' => 'Annex C3', 'room_type' => 'Private', 'floor_id' => 'F05', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],




            [
                'room_id' => 'RAD101' , 'room_name' => 'room 1', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD102' , 'room_name' => 'room 2', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD103' , 'room_name' => 'room 3', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD104' , 'room_name' => 'room 4', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD105' , 'room_name' => 'room 5', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD106' , 'room_name' => 'room 6', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD107' , 'room_name' => 'room 7', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD108' , 'room_name' => 'room 8', 'room_building' => 'Annex D1', 'room_type' => 'Private', 'floor_id' => 'F05', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD109' , 'room_name' => 'room 9', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD110' , 'room_name' => 'room 10', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD111' , 'room_name' => 'room 11', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD112' , 'room_name' => 'room 12', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD113' , 'room_name' => 'room 13', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD114' , 'room_name' => 'room 14', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD115' , 'room_name' => 'room 15', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD116' , 'room_name' => 'room 16', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD117' , 'room_name' => 'room 17', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD118' , 'room_name' => 'room 18', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD119' , 'room_name' => 'room 19', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD120' , 'room_name' => 'room 20', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD121' , 'room_name' => 'room 21', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD122' , 'room_name' => 'room 22', 'room_building' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],

            
            
            [
                'room_id' => 'RAE01' , 'room_name' => 'ward 1', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE02' , 'room_name' => 'ward 2', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE03' , 'room_name' => 'ward 3', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE04' , 'room_name' => 'ward 4', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE05' , 'room_name' => 'ward 5', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE06' , 'room_name' => 'ward 6', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE07' , 'room_name' => 'ward 7', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE08' , 'room_name' => 'ward 8', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE09' , 'room_name' => 'ward 9', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE10' , 'room_name' => 'ward 10', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE11' , 'room_name' => 'ward 11', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE12' , 'room_name' => 'ward 12', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE13' , 'room_name' => 'ward 13', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE14' , 'room_name' => 'ward 14', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE15' , 'room_name' => 'ward 15', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE16' , 'room_name' => 'ward 16', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE17' , 'room_name' => 'ward 17', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE18' , 'room_name' => 'ward 18', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE19' , 'room_name' => 'ward 19', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE20' , 'room_name' => 'ward 20', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE21' , 'room_name' => 'ward 21', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE22' , 'room_name' => 'ward 22', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE23' , 'room_name' => 'ward 23', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE24' , 'room_name' => 'ward 24', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE25' , 'room_name' => 'ward 25', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE26' , 'room_name' => 'ward 26', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE27' , 'room_name' => 'ward 27', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE28' , 'room_name' => 'ward 28', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE29' , 'room_name' => 'ward 29', 'room_building' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],




            

            

       ];

       room::insert($rooms);
    }
}
