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

    public function edit($id)
    {
        $data['grievance'] = Grievance::findOrFail($id);
        $data['statuses'] = ['Open','In-prograss','Rejected','Out of scope','Done'];
        return view('edit_grievance', $data);
    }

}
