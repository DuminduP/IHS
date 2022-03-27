<?php

namespace Database\Seeders;

use App\Models\Grievance;
use Database\Factories\GrievanceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedGrievances extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grievance::factory()->count(10)->create();
    }
}
