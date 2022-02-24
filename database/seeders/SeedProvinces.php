<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Provinces extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
        ['name' => 'Western'],
        ['name' => 'Central'],
        ['name' => 'Southern'],
        ['name' => 'North Western'],
        ['name' => 'Sabaragamuwa'],
        ['name' => 'Eastern'],
        ['name' => 'Uva'],
        ['name' => 'North Central'],
        ['name' => 'Northern'],
        ]);

    }
}
