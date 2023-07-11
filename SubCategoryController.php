<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Sub_Category;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    

     public function save(Request $request)
    {
       
        $catId = $request->input('cat_id'); 
        
        $input = $request->all();
        $input['category_id'] = $catId; 
        unset($input['_token']);
        unset($input['cat_id']);
        $input['created_at'] = date('Y-m-d H:i:s');

        // $ins = array(
        //     'category_id' => $request->input('cat_id'), //second method

        // );
        Sub_Category::insert($input);
        return redirect("/subcategory");
    }

    public function add(Request $request)
    {
        
        $data = Category::get();
        return view('subcategory.add',compact('data'));
    }

    public function index()
    {
        $data = Sub_Category::with('category')->get();
        return view('subcategory.index',compact('data'));
    }


    public function edit($id)
    {
        $data = Sub_Category::find($id);
        $cat = Category::get();
        return view('subcategory.edit',compact('data','cat'));
    }

   

    public function update(Request $request)
    {
        $catId = $request->input('cat_id'); 
        $input = $request->all();
        $input['category_id'] = $catId; 
        unset($input['_token']);
        unset($input['cat_id']);

        Sub_Category::where("id","=",$input['id'])->update($input);
        return redirect("/subcategory");
    }

    public function delete($id)
    {
        Sub_Category::where("id","=",$id)->delete();
        return redirect("/subcategory");
    }
   
 
}