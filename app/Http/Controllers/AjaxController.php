<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function setMaxPoints(Request $request) {
        $max_points = DB::table('admin_rules')->whereNotNull('max_star_points')->update(['max_star_points' => $request->max_points]);
        if($max_points == 0) {
          $max_points = DB::table('admin_rules')->insert(['max_star_points' => $request->max_points]);
        }
        return response()->json(['msg' => 'Max Points Set successfully', 'max_points' =>  DB::table('admin_rules')->whereNotNull('max_star_points')->pluck('max_star_points')->first()]);
    }

    public function setUserProfile(Request $request) {
      // dd($request->profile);
        $user = User::find($request->user_id);
        $user->profile = $request->profile;
        $user->save();
        return response()->json(['msg' => 'Profile Set successfully']);
    }
}