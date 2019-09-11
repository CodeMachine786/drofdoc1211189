<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use App\Category;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('checkRole:admin');
    }
    public function dashboard(){
        return view('dashboard');
    }
}
