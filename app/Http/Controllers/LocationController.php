<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{

    public function getDistricts($provinceId)
    {
        $list = DB::table("districts")
            ->select("id", "name")
            ->where('province_id', $provinceId)
            ->get();
        return response()->json($list);
    }

    public function getCities($districtId)
    {
        $list = DB::table("cities")
            ->select("id", "name")
            ->where('district_id', $districtId)
            ->get();
        return response()->json($list);
    }

}
