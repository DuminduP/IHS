<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrievanceRequest;
use App\Models\Grievance;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $data['grievances_count'] = Grievance::all()->count();
        return view('dashboard', $data);
    }

   

}
