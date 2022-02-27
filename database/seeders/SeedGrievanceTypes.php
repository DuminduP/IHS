<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedGrievanceTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grievance_types')->insert([
            ['type' => 'Accessibility of services'],
            ['type' => 'Billing & payments'],
            ['type' => 'Bribe'],
            ['type' => 'Communication issue'],
            ['type' => 'Complaint'],
            ['type' => 'Corruption'],
            ['type' => 'Delays'],
            ['type' => 'Fees'],
            ['type' => 'Help & Support'],
            ['type' => 'Lack of facility'],
            ['type' => 'Service quality'],
            ['type' => 'Social needs'],
            ['type' => 'Sugestions'],
            ['type' => 'Welfiar'],
        ]);
    }
}
