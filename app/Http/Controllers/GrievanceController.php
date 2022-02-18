<?php

namespace App\Http\Controllers;

use App\Models\Grievance;

class GrievanceController extends Controller
{

    public function view($id)
    {
        $data['grievance'] = Grievance::findOrFail($id);
        return view('view_grievance', $data);
    }

}
