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
                'room_id' => 'RAA1' , 'room_name' => '001', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA2' , 'room_name' => '002', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA3' , 'room_name' => '003', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA4' , 'room_name' => '004', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA5' , 'room_name' => '005', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA6' , 'room_name' => '006', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA7' , 'room_name' => '007', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA8' , 'room_name' => '008', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA9' , 'room_name' => '009', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA10' , 'room_name' => '010', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA11' , 'room_name' => '011', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA12' , 'room_name' => '012', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA13' , 'room_name' => '013', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA14' , 'room_name' => '014', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA15' , 'room_name' => '015', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA16' , 'room_name' => '016', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA17' , 'room_name' => '017', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA18' , 'room_name' => '018', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA19' , 'room_name' => '019', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA20' , 'room_name' => '020', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA21' , 'room_name' => '021', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA22' , 'room_name' => '022', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAA23' , 'room_name' => '023', 'room_floor' => 'Annex A', 'room_type' => 'Semi-Private', 'floor_id' => 'F01', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],







            [
                'room_id' => 'RAB01' , 'room_name' => '101', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB02' , 'room_name' => '102', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB03' , 'room_name' => '103', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB04' , 'room_name' => '104', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB05' , 'room_name' => '105', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB06' , 'room_name' => '106', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB07' , 'room_name' => '107', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB08' , 'room_name' => '108', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB09' , 'room_name' => '109', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB10' , 'room_name' => '110', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB11' , 'room_name' => '111', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB12' , 'room_name' => '112', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB13' , 'room_name' => '113', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAB14' , 'room_name' => '114', 'room_floor' => 'Annex B', 'room_type' => 'Semi-Private', 'floor_id' => 'F02', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],








            [
                'room_id' => 'RAC11' , 'room_name' => '201', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC12' , 'room_name' => '202', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC13' , 'room_name' => '203', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC14' , 'room_name' => '204', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC15' , 'room_name' => '205', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC16' , 'room_name' => '206', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC17' , 'room_name' => '207', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC18' , 'room_name' => '208', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC19' , 'room_name' => '209', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC110' , 'room_name' => '210', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC111' , 'room_name' => '211', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC112' , 'room_name' => '212', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC113' , 'room_name' => '213', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC114' , 'room_name' => '214', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC115' , 'room_name' => '215', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC116' , 'room_name' => '216', 'room_floor' => 'Annex C1', 'room_type' => 'Semi-Private', 'floor_id' => 'F03', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],





            [
                'room_id' => 'RAC21' , 'room_name' => 'sr1', 'room_floor' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC22' , 'room_name' => 'sr2', 'room_floor' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC23' , 'room_name' => 'sr3', 'room_floor' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC24' , 'room_name' => 'sr4', 'room_floor' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC25' , 'room_name' => 'sr5', 'room_floor' => 'Annex C2', 'room_type' => 'Private', 'floor_id' => 'F04', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC26' , 'room_name' => '217', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC27' , 'room_name' => '218', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC28' , 'room_name' => '219', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC29' , 'room_name' => '220', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC210' , 'room_name' => '221', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC211' , 'room_name' => '222', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC212' , 'room_name' => '223', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC213' , 'room_name' => '224', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC214' , 'room_name' => '225', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC215' , 'room_name' => '226', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC216' , 'room_name' => '227', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC217' , 'room_name' => '228', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC218' , 'room_name' => '229', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC219' , 'room_name' => '230', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC220' , 'room_name' => '231', 'room_floor' => 'Annex C2', 'room_type' => 'Semi-Private', 'floor_id' => 'F04', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],


            [
                'room_id' => 'RAC21' , 'room_name' => '232 - A', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC22' , 'room_name' => '232 - B', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC23' , 'room_name' => '232 - C', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC24' , 'room_name' => '233', 'room_floor' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC25' , 'room_name' => '234', 'room_floor' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC26' , 'room_name' => '235 - A', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC27' , 'room_name' => '235 - B', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC28' , 'room_name' => '235 - C', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC29' , 'room_name' => '236 - A', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC310' , 'room_name' => '236 - B', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC311' , 'room_name' => '326 - C', 'room_floor' => 'Annex C3', 'room_type' => 'Ward', 'floor_id' => 'F05', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC312' , 'room_name' => '237', 'room_floor' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC313' , 'room_name' => '238', 'room_floor' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC314' , 'room_name' => '239', 'room_floor' => 'Annex C3', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2400', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAC315' , 'room_name' => 'sr7', 'room_floor' => 'Annex C3', 'room_type' => 'Private', 'floor_id' => 'F05', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],




            [
                'room_id' => 'RAD11' , 'room_name' => '301', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD12' , 'room_name' => '302', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD13' , 'room_name' => '303', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD14' , 'room_name' => '304', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD15' , 'room_name' => '305', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD16' , 'room_name' => '306', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD17' , 'room_name' => '307', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD18' , 'room_name' => '308', 'room_floor' => 'Annex D1', 'room_type' => 'Private', 'floor_id' => 'F05', 'room_price' => '3200', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD19' , 'room_name' => '309', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD110' , 'room_name' => '310', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD111' , 'room_name' => '311', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD112' , 'room_name' => '312', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD113' , 'room_name' => '313', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD114' , 'room_name' => '314', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD115' , 'room_name' => '315', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD116' , 'room_name' => '316', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD117' , 'room_name' => '317', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD118' , 'room_name' => '318', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD119' , 'room_name' => '319', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD120' , 'room_name' => '320', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD121' , 'room_name' => '321', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAD122' , 'room_name' => '322', 'room_floor' => 'Annex D1', 'room_type' => 'Semi-Private', 'floor_id' => 'F05', 'room_price' => '2300', "created_at"=> now(), "updated_at"=> now()
            ],

            
            
            [
                'room_id' => 'RAE1' , 'room_name' => 'ward 1', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE2' , 'room_name' => 'ward 2', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE3' , 'room_name' => 'ward 3', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE4' , 'room_name' => 'ward 4', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE5' , 'room_name' => 'ward 5', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE6' , 'room_name' => 'ward 6', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE7' , 'room_name' => 'ward 7', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE8' , 'room_name' => 'ward 8', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE9' , 'room_name' => 'ward 9', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE10' , 'room_name' => 'ward 10', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE11' , 'room_name' => 'ward 11', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE12' , 'room_name' => 'ward 12', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE13' , 'room_name' => 'ward 13', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE14' , 'room_name' => 'ward 14', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE15' , 'room_name' => 'ward 15', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE16' , 'room_name' => 'ward 16', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE17' , 'room_name' => 'ward 17', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE18' , 'room_name' => 'ward 18', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE19' , 'room_name' => 'ward 19', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE20' , 'room_name' => 'ward 20', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE21' , 'room_name' => 'ward 21', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE22' , 'room_name' => 'ward 22', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE23' , 'room_name' => 'ward 23', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE24' , 'room_name' => 'ward 24', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE25' , 'room_name' => 'ward 25', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE26' , 'room_name' => 'ward 26', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE27' , 'room_name' => 'ward 27', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE28' , 'room_name' => 'ward 28', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],
            [
                'room_id' => 'RAE29' , 'room_name' => 'ward 29', 'room_floor' => 'Annex E', 'room_type' => 'Ward', 'floor_id' => 'F06', 'room_price' => '1100', "created_at"=> now(), "updated_at"=> now()
            ],




            

            

       ];

       room::insert($rooms);
    }
}
