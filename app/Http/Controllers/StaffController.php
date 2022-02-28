<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Models\User;

class StaffController extends Controller
{
    public function list()
    {
        $data['staff_list'] = User::all();
        return view('list_staff', $data);
    }

}
