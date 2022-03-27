<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeedGrievanceTypes::class,
            SeedUserRoles::class,
            SeedProvinces::class,
            SeedDistricts::class,
            SeedCities::class,
        ]);
    }
}
