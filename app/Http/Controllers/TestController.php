<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    public function test()
    {
        return User::find(7)->address->delete();
    }

    public function componentTest(){
        return view('home', ['data' => DB::table('sliders')->get() ,'products' => DB::table('products')->paginate(8)]);
    }
}
