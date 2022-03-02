<?php

namespace App\Http\Controllers;

use App\Models\Rating;

class RatingsController extends Controller
{
    public function list()
    {
        $data['ratings'] = Rating::all();
        return view('list_ratings', $data);
    }

}
