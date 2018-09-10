<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {

    }

    public function show(User $user)
    {
        return $user;
    }

    public function edit(User $user)
    {
        return $user;
    }

    public function update(User $user)
    {
        return $user;
    }

    public function delete(User $user)
    {
        return $user;
    }

}
