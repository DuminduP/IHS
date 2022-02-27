<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Models\Institution;
use App\Models\Province;
use App\Models\SubInstitution;

class InstitutionController extends Controller
{
    public function list()
    {
        $data['institutions'] = Institution::all();
        return view('list_institutions', $data);
    }

    public function getSubInstitutions(int $institutionId)
    {
        $subInstitution = SubInstitution::select('id', 'name')->where('institution_id', $institutionId)->get();
        return response()->json($subInstitution);
    }

    public function getInstitutions(int $cityId)
    {
        $institution = Institution::select('id','name')->where('city_id', $cityId)->get();
        return response()->json($institution);
    }

    function new () {
        $data['institution'] = new Institution();
        $data['provinces'] = Province::all();
        return view('edit_institution', $data);
    }

    function view (int $id) {
        $data['institution'] = Institution::findOrFail($id);
        $data['provinces'] = Province::all();
        return view('view_institution', $data);
    }

    function print (int $id) {
        $data['institution'] = Institution::findOrFail($id);
        return view('print_institution', $data);
    }

    function edit (int $id) {
        $data['institution'] = Institution::findOrFail($id);
        $data['provinces'] = Province::all();
        return view('edit_institution', $data);
    }

    public function store(StoreInstitutionRequest $request)
    {
        $institution = new Institution();
        $institution->name = $request->name;
        $institution->address = $request->address;
        $institution->phone = $request->phone;
        $institution->email = $request->email;
        $institution->province_id = $request->province_id;
        $institution->district_id = $request->district_id;
        $institution->city_id = $request->city_id;
        $institution->save();

        return redirect()->route('list-institutions')->with('status', 'Institution added!');
    }

    public function update(int $id, StoreInstitutionRequest $request)
    {
        $institution = Institution::findOrFail($id);
        $institution->name = $request->name;
        $institution->address = $request->address;
        $institution->phone = $request->phone;
        $institution->email = $request->email;
        $institution->province_id = $request->province_id;
        $institution->district_id = $request->district_id;
        $institution->city_id = $request->city_id;
        $institution->save();

        return redirect()->route('list-institutions')->with('status', 'Institution updated!');
    }

}
