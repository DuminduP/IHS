<?php

namespace Database\Seeders;

use App\Models\GrievanceOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedOwners extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrievanceOwner::factory()->count(10)->create();
    }
}
