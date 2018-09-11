<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    public function test()
    {
        $user = User::where('email', 'admin@admin.com')->first();

        return $user->role->slug;
    }

    public function testGit(){
        return "C'est bon git remarche";
    }
}
