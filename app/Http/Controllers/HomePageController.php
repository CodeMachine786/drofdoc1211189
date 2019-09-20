<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomePageController extends Controller
{
    public function index(){
        if(isset(Auth::user()->admin) && Auth::user()->admin == true ){
            return redirect(route('Dashboard'));
        }
        return view('home');
	}
	public function subscribe(Request $request){
	    $check = DB::table('subscriber')->where('email', $request->input('email'))->first();
	    if(empty($check)){
	        DB::table('subscriber')->insert(
	            ['email' => $request->input('email')]
	            );
	    }else{
	        echo "Email address already exist";
	    }
	   
	}
}
