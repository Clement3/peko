<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    public function test()
    {
        return User::find(7)->address->delete();
    }

    public function componentTest(){
        $cat = Category::get();
        $products = Product::paginate(8);
        $slider  = Slider::get();
        return view('home', ['data' => $slider ,'products' => $products, 'cat' => $cat]);
    }
}