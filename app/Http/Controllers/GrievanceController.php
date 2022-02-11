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

class GrievanceController extends Controller
{

    public function view($id)
    {
        $data['grievance'] = Grievance::findOrFail($id);
        return view('view_grievance', $data);
    }

   

}
