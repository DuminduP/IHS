<?php

namespace App\Http\Controllers;

use App\Models\GrievanceOwner;
use Illuminate\Http\Request;

class GrievanceOwnerController extends Controller
{

    public function edit($id)
    {
        $data['owner'] = GrievanceOwner::findOrFail($id);
        return view('edit_owner', $data);
    }

    public function store($id, Request $request)
    {
        $owner = GrievanceOwner::findOrFail($id);

        $request->validate([
            'name' => 'required|max:100',
            'mobile' => 'required|max:10',
            'email' => 'email',
        ]);

        $owner->name = $request->name;
        $owner->mobile = $request->mobile;
        $owner->email = $request->email;
        $owner->address = $request->address;
        $owner->save();

        return redirect()->route('dashboard')->with('status', 'Owner updated!');
    }

}
