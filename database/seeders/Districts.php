<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Districts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            array('province_id' => '6','name' => 'Ampara'),
            array('province_id' => '8','name' => 'Anuradhapura'),
            array('province_id' => '7','name' => 'Badulla'),
            array('province_id' => '6','name' => 'Batticaloa'),
            array('province_id' => '1','name' => 'Colombo'),
            array('province_id' => '3','name' => 'Galle'),
            array('province_id' => '1','name' => 'Gampaha'),
            array('province_id' => '3','name' => 'Hambantota'),
            array('province_id' => '9','name' => 'Jaffna'),
            array('province_id' => '1','name' => 'Kalutara'),
            array('province_id' => '2','name' => 'Kandy'),
            array('province_id' => '5','name' => 'Kegalle'),
            array('province_id' => '9','name' => 'Kilinochchi'),
            array('province_id' => '4','name' => 'Kurunegala'),
            array('province_id' => '9','name' => 'Mannar'),
            array('province_id' => '2','name' => 'Matale'),
            array('province_id' => '3','name' => 'Matara'),
            array('province_id' => '7','name' => 'Monaragala'),
            array('province_id' => '9','name' => 'Mullaitivu'),
            array('province_id' => '2','name' => 'Nuwara Eliya'),
            array('province_id' => '8','name' => 'Polonnaruwa'),
            array('province_id' => '4','name' => 'Puttalam'),
            array('province_id' => '5','name' => 'Ratnapura'),
            array('province_id' => '6','name' => 'Trincomalee'),
            array('province_id' => '9','name' => 'Vavuniya')
        ]);

    }
}
