<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrievanceRequest;
use App\Models\Grievance;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $data['grievances'] = Grievance::all();
        return view('dashboard', $data);
    }

   

}
