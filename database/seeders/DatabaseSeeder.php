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
        $this->call(departmentSeeder::class);
        $this->call(floorSeeder::class);


        // Seed other seeders as needed

        $this->call(formCategorySeeder::class);
        $this->call(categoryAttributeSeeder::class);

        $this->call(PECseeder::class);
        $this->call(PEAseeder::class);

        $this->call(residentSeeder::class);
        $this->call(roomSeeder::class);

        $this->call(MedicineSeeder::class);
        $this->call(userSeeder::class);
    }
}
