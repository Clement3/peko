<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    public function test()
    {
        
    }

    public function slider(){
        $data = DB::table('sliders')->get();
        return view('home', ['data' => $data]);
    }
}
