<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::get();
        $products = Product::paginate(8);
        $slider  = Slider::get();
        return view('home', ['data' => $slider ,'products' => $products, 'cat' => $cat]);    
    }
}
