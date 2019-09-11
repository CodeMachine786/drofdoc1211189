<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\DB;
use App\PersonalInfo;
class ListingController extends Controller
{
    public function index(){
        // $results = PersonalInfo::all()
        $results = DB::select( DB::raw("select a.* , b.city , b.state, b.pincode
        from personal_info a
        inner join profile b on a.user_id=b.user_id") );;
        return view('listing', compact('results'));
    }
}
