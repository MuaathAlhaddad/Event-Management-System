<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getStates(Request $request)
    {
        try {
            $country =  Country::with('states')->whereName($request->country)->first();
            return response(json_encode($country), 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response($e, 404);
        }
    }
}
