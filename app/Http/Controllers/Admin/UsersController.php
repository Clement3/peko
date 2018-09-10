<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('admin/users/index', ['users' => $users]);
    }

    public function show(User $user)
    {
        $users = User::All('id, name, email');

        return view('admin/users/show', ['users' => $users]);
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
