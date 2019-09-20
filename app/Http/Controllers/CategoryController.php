<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
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
            $model->cat_desc = Input::post('cat_desc');
            if($model->save()){
                Session::flash('success','Category has been added successfully');

                return redirect('admin/category');
            }
        }
        
    }
    public function editCategory(Request $request){
        if($request->isMethod('get')){
            $id = $request->id;
            $category = Category::whereId($id)->get();
            return view('category.edit',compact('category'));

        }
        if($request->isMethod('post')){
            $id = $request->id;
            $category = Category::find($id);
            $category->cat_name = $request->category_name;
            $category->cat_desc = $request->cat_desc;
             if($category->update()){
            Session::flash('success','Category has been updated successfully');
             return redirect('admin/category');
            }
           }
    }
     public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        Session::flash('success','Category has been deleted successfully');
        return redirect('admin/category');
    }
}
