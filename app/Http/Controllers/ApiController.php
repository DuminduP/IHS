<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGrievanceRequest;
use App\Models\Grievance;
use App\Models\GrievanceFile;
use App\Models\GrievanceOwner;
use App\Models\Institution;
use App\Models\SubInstitution;
use Illuminate\Support\Facades\DB;
use App\Library\Mysms;

class ApiController extends Controller
{

    public function getInstitution(int $id)
    {
        $institution = Institution::find($id);
        return $this->responseJson($institution);
    }

    public function getSubInstitution(int $id)
    {
        $subInstitution = SubInstitution::find($id);
        return $this->responseJson($subInstitution);
    }

    public function getGrievanceByUuid($uuid)
    {
        $data = Grievance::select('uuid', 'title', 'description', 'notes', 'status', 'institutions.name as institution_name', 'sub_institutions.name as sub_institution_name', 'grievances.created_at', 'grievances.updated_at')
            ->where('uuid', $uuid)
            ->leftJoin('institutions', 'institutions.id', 'institution_id')
            ->leftJoin('sub_institutions', 'sub_institutions.id', 'sub_institution_id')
            ->first();

        return $this->responseJson($data);
    }

    public function saveGrievance(StoreGrievanceRequest $request)
    {
        try {
            //Check is owner already exists
            $owner = GrievanceOwner::where('mobile', $request->mobile)->first() ?? new GrievanceOwner();

            $owner->name = $request->name;
            $owner->mobile = $request->mobile;
            $owner->address = $request->address ?? $owner->address;
            $owner->email = $request->email ?? $owner->email;
            $owner->user_agent = $request->server('HTTP_USER_AGENT');
            $owner->ip = $request->ip();
            $owner->save();

            //Insert Grievance
            $grievance = new Grievance();
            $grievance->title = $request->title;
            $grievance->description = $request->description;
            $grievance->grievance_owner_id = $owner->id;
            $grievance->institution_id = $request->id;
            $grievance->sub_institution_id = $request->sid;
            $grievance->uuid = $grievance->getUuid();
            $grievance->save();

            //handel file uploads
            if (isset($_FILES['file']['name'])) {
                $fileExtension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                $newFileName = $grievance->id . '-' . uniqid() . '.' . $fileExtension;
                $target_path = public_path('grievanceFiles') . "/" . basename($newFileName);
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                    $gf = new GrievanceFile();
                    $gf->name = $newFileName;
                    $gf->grievance_id = $grievance->id;
                    $gf->type = $fileExtension;
                    $gf->save();
                }
            }

            $result = ['status' => 200, 'message' => 'Grievance successfully saved!', 'data' => ['grievanceRefNo' => $grievance->uuid]];
            $mysms = new Mysms();
            $message = "Your grievace successfully created. \n";
            $message .= "Referesnce Number is $grievance->uuid \n";
            $message .= "Visit this link for status updates ".env('QR_HOST')."/report/status/?uuid=".$grievance->uuid;
            $mysms->sendSMS($request->mobile, $message);
        } catch (\Exception $e) {
            DB::rollback();
            $result = ['status' => 500, 'message' => ["Error saving record.{$e->getMessage()}"]];
            return response()->json($result, 500);
        }

        return response()->json($result, 200);
    }

    private function responseJson($data)
    {
        if (!empty($data)) {
            $result['status'] = 200;
            $result['message'] = 'Success';
            $result['data'] = $data;
        } else {
            $result['status'] = 404;
            $result['message'] = 'Data Not Available';
            $result['data'] = [];
        }
        return response()->json($result, $result['status']);
    }

}
