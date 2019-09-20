<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Console\MiddlewareMakeCommand;
use App\Category;
use App\PageModel;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('checkRole:admin');
    }
 
    public function dashboard(){
        return view('dashboard');
    }

    public function login(){
    	//return "";
    	return view('admin.login');

    }
    public function register(){
    	return view('admin.register');

    }
    
    public function subscriber(){
        $subscriber = DB::table('subscriber')->get();
        return view('pages.subscriber',compact('subscriber'));
    }
    
    public function ajaxSubmit(Request $request){
        $template = $request->input('template');
        $page_name = $request->input('page_name');
        $page_slug = $request->input('page_slug');
        $page_type = $request->input('page_type');
        $description = $request->input('description');
        
        $output = [];
        if( !empty($template) && !empty($page_name) && !empty($page_slug) && !empty($page_type) && !empty($description) ){
            $checkPage = PageModel::where('page_type',$page_type)->first();
            
            if( !empty($checkPage) ){
                $checkPage->template_name = $template;
                $checkPage->page_title    = $page_name;
                $checkPage->page_url      = $page_slug;
                $checkPage->description   = $description;
                $checkPage->page_type     = $page_type;
                if( $checkPage->save() ){
                    $output['error'] = false;
                    $output['msg'] = "Your Data has been updated successfully";
                }
            }else{
                $model = new PageModel();
                $model->template_name = $template;
                $model->page_title    = $page_name;
                $model->page_url      = $page_slug;
                $model->description   = $description;
                $model->page_type     = $page_type;
                if( $model->save() ){
                    $output['error'] = false;
                    $output['msg'] = "Your Data has been inserted successfully";
                }
            }
        }else{
            $output['error'] = true;
            $output['msg'] = "All fields are required";
        }
        return json_encode($output);
    }
}
