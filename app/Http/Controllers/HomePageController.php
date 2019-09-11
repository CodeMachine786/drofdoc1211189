<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index(){
        if(isset(Auth::user()->admin) && Auth::user()->admin == true ){
            return redirect(route('Dashboard'));
        }
        return view('home');
	}
}
