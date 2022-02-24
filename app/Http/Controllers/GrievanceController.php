<?php

namespace App\Http\Controllers;

use App\Models\Grievance;
use Illuminate\Http\Request;
use App\Library\Mysms;
use App\Library\FileUploader;

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
        $data['statuses'] = ['Open', 'In-prograss', 'Rejected', 'Out of scope', 'Done'];
        return view('edit_grievance', $data);
    }

    public function store($id, Request $request)
    {
        $grievance = Grievance::findOrFail($id);

        $request->validate([
            'status' => 'required',
            'grievance_type_id' => 'required',
        ]);

        $grievance->notes = $request->notes;
        $grievance->status = $request->status;
        $grievance->grievance_type_id = $request->grievance_type_id;
        $grievance->institution_id = $request->institution_id;
        $grievance->sub_institution_id = $request->sub_institution_id;
        $grievance->save();

        //handel file uploads
        FileUploader::upload($_FILES['file'], $grievance->id);

        if($grievance->status == 'Done')    {
            $mysms = new Mysms();
            $message = "Your grievace $grievance->uuid was closed. \n";
            $message .= "Visit this link to give your feedback ".env('QR_HOST')."/report/status/?uuid=".$grievance->uuid;
            $mysms->sendSMS($grievance->owner->mobile, $message);
        }

        return redirect()->route('dashboard')->with('status', 'Grievance updated!');
    }
}
