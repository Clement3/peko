<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(5);

        return view('admin/users/index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin/users/show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('admin/users/edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        return view('admin/users/update', ['user' => $user]);
    }

    public function delete(User $user)
    {
        return view('admin/users/delete', ['user' => $user]);
    }

}
