<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $User = [   

            [
               'id' => 1,
               'name' => 'paul',
               'email' => 'paul@gmail.com',
               'password' => bcrypt(123),
               'role' => 'admin', 


               'created_at' => now(),
               'updated_at' => now(),
            ],
            
       ];

       User::insert($User);
    }
}
