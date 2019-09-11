<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('checkRole:admin');
    }
    
    public function category(){
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }
    
    public function addCategory(){
        return view('category.add');
    }
    
    public function create(Request $request){
        if ($request->has('submit'))
        {
            $model = new Category();
            $model->cat_name = Input::post('category_name');
            $model->cat_desc = Input::post('category_name');
            if($model->save()){
                return redirect('admin/category');
            }
        }
        
    }
}
