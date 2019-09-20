<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageModel;

class PageController extends Controller
{
    public function __construct(){
        $this->middleware('checkRole:admin');
    }
    
    public function index(){
        $model = new PageModel();
        return view('pages.addPage', compact('model'));
    }
}
