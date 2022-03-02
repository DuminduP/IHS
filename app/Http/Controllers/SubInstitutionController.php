<?php

namespace App\Http\Controllers;

use App\Models\SubInstitution;

class SubInstitutionController extends Controller
{
    public function getSubInstitutions(int $institutionId)
    {
        $subInstitution = SubInstitution::select('id','name')->where('institution_id', $institutionId)->get();
        return response()->json($subInstitution);
    }

}
