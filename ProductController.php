<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    

     public function save(Request $request)
    {
       
       
        $catId = $request->input('cat_id'); 
        $input = $request->all();
        $input['category_id']=$catId;
        unset($input['_token']);
        unset($input['cat_id']);
        
        $input['created_at'] = date('Y-m-d H:i:s');
       

        
        Product::insert($input);
        return redirect("/product");
    }

    public function add(Request $request)
    {
        
        $data = Category::get();
        $dat=Sub_Category::get();
        return view('product.add',compact('data','dat'));
    }

    public function index()
    {
        $data = Product::get();
        return view('product.index',compact('data'));
    }


    public function edit($id)
    {
        $data = Product::find($id);
        $cat = Category::get();
        $dat= Sub_Category::get();
        return view('product.edit',compact('data','cat','dat'));
    }

   

    public function update(Request $request)
    {
        $catId = $request->input('cat_id'); 
        $input = $request->all();
        $input['category_id']=$catId;
        unset($input['_token']);
        unset($input['cat_id']);
       
        Product::where("id","=",$input['id'])->update($input);
        return redirect("/product");
    }

    public function delete($id)
    {
        Product::where("id","=",$id)->delete();
        return redirect("/product");
    }
   
 
}