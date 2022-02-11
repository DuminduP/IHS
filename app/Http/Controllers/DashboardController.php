<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrievanceRequest;
use App\Models\Grievance;
use App\Models\GrievanceFile;
use App\Models\GrievanceOwner;
use App\Models\Institution;
use App\Models\SubInstitution;
use Faker\Core\Uuid;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $data['grievances'] = Grievance::all();
        return view('dashboard', $data);
    }

   

}
