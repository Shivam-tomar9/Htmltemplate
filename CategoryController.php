<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Sub_Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function add()
    {
        // $data = Category::get();
        return view('category.add');
    }


    public function save(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $input['created_at']=date('Y-m-d H:i:s');
        Category::insert($input);
        return redirect("/category");
    }


    public function index()
    {
        
        $data = Category::get();
        return view('category.index',compact('data'));
    }


    public function edit($id)
    {
        $data = Category::find($id);
        return view('category.edit',compact('data'));
    }

   

    public function update(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $input['updated_at']=date('Y-m-d H:i:s');
        Category::where("id","=",$input['id'])->update($input);
        return redirect("/category");
    }

    public function delete($id)
    {
        Category::where("id","=",$id)->delete();
        return redirect("/category");
    }
   
 
}

