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
        $listing = DB::table('personal_info')
            ->join('profile', 'personal_info.user_id', '=', 'profile.user_id')
            ->get();
            //$count = DB::table('users')->whereTypeId(3)->count();
            //print_r($count);die();
            $pagination = DB::table('personal_info')
            ->join('profile', 'personal_info.user_id', '=', 'profile.user_id')->paginate(2);   
        return view('listing', compact('listing', 'pagination'));
    }
    public function ajaxSearch(Request $request){
        $zip = $request->input('zip');
        $q =  $request->input('value');
        if($q != ""){
            $details = DB::table('personal_info')
            ->leftJoin('profile', 'personal_info.user_id', '=', 'profile.user_id')->where('name','LIKE',$q . '%')
            ->get();
            if(count($details)> 0){
                return view('listing',compact('details'));
            }else{
                return 1;
            }
        }if($zip != ""){
            $details = DB::table('personal_info')
            ->leftJoin('profile', 'personal_info.user_id', '=', 'profile.user_id')->where('pincode','LIKE',$zip . '%')
            ->get();
            if(count($details)> 0){
                return view('listing',compact('details'));
            }else{
                return 1;
            }
        }
    }
}
