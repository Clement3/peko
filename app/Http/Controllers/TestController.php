<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    public function test()
    {
        
    }

    public function testGit(){
        return "C'est bon git remarche";
    }
}
