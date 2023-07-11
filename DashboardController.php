<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\Product;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
   
    public function index()
    {
        $category=Category::count();
        $subcategory=Sub_Category::count();
        $product = Product::count();
        return view('admin.dash',compact('category','subcategory','product'));
    }
   
 
}