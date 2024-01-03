<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(userSeeder::class);
        $this->call(departmentSeeder::class);
        $this->call(residentSeeder::class);


        $this->call(floorSeeder::class);
        $this->call(roomSeeder::class);

        $this->call(MedicineSeeder::class);
      


        $this->call(formCategorySeeder::class);
        $this->call(categoryAttributeSeeder::class);

        $this->call(PECseeder::class);
        $this->call(PEAseeder::class);


      

       
    }
}
