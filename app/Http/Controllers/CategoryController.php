<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request){
        Category::saveCategory($request);
        return back();
    }

    public function manageCategory(){
        return view('admin.category.manage-category',[
           'categories'=> Category::all()
        ]);

    }
    public function deleteCategory(Request $request)
    {
        Category::categoryDelete($request->id);
        return back();
    }

    public function editCategory($id)
    {
        return view('admin.category.edit',['category'=>Category::find($id)]);
    }

    public  function updateCategory(Request $request)
    {
        Category::updateCategory($request);
        return redirect('/manage-category')->with('message','updated successfully');

    }
}
