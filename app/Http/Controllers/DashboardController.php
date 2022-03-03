<?php

namespace App\Http\Controllers;

use App\Models\Grievance;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $data['grievances_count'] = Grievance::all()->count();
        $data['grievances_completed'] = Grievance::where('status', 'done')->count();
        $data['grievances_new'] = Grievance::where('status', 'open')->count();
        $data['grievances_inp'] = Grievance::where('status', 'In-prograss')->count();

        return view('dashboard', $data);
    }

   

}
