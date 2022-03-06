<?php

namespace App\Http\Controllers;

use App\Models\SubInstitution;
use App\Models\Institution;
use App\Http\Requests\StoreInstitutionRequest;
use App\Models\Province;

class SubInstitutionController extends Controller
{
    public function getSubInstitutions(int $institutionId)
    {
        $subInstitution = SubInstitution::select('id','name')->where('institution_id', $institutionId)->get();
        return response()->json($subInstitution);
    }

    public function list()
    {
        $data['SubInstitutions'] = SubInstitution::all();
        return view('list_SubInstitutions', $data);
    }

    function new () {
        $data['SubInstitution'] = new SubInstitution();
        $data['provinces'] = Province::all();
        return view('edit_SubInstitution', $data);
    }

    function view (int $id) {
        $data['SubInstitution'] = SubInstitution::findOrFail($id);
        $data['provinces'] = Province::all();
        return view('view_SubInstitution', $data);
    }

    function print (int $id) {
        $data['SubInstitution'] = SubInstitution::findOrFail($id);
        return view('print_SubInstitution', $data);
    }

    function edit (int $id) {
        $data['SubInstitution'] = SubInstitution::findOrFail($id);
        $data['provinces'] = Province::all();
        return view('edit_SubInstitution', $data);
    }

    public function store(StoreInstitutionRequest $request)
    {
        $SubInstitution = new SubInstitution();
        $SubInstitution->name = $request->name;
        $SubInstitution->institution_id = $request->institution_id;
        $SubInstitution->address = $request->address;
        $SubInstitution->phone = $request->phone;
        $SubInstitution->email = $request->email;
        $SubInstitution->province_id = $request->province_id;
        $SubInstitution->district_id = $request->district_id;
        $SubInstitution->city_id = $request->city_id;
        $SubInstitution->save();

        return redirect()->route('list-sub-institutions')->with('status', 'Sub-Institution added!');
    }

    public function update(int $id, StoreInstitutionRequest $request)
    {
        $SubInstitution = SubInstitution::findOrFail($id);
        $SubInstitution->name = $request->name;
        $SubInstitution->address = $request->address;
        $SubInstitution->phone = $request->phone;
        $SubInstitution->email = $request->email;
        $SubInstitution->province_id = $request->province_id;
        $SubInstitution->district_id = $request->district_id;
        $SubInstitution->city_id = $request->city_id;
        $SubInstitution->save();

        return redirect()->route('list-sub-institutions')->with('status', 'Sub-Institution updated!');
    }

}
