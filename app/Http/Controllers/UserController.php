<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::orderBy('name', 'asc')->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show($id) {

        $user = User::findOrFail($id);

        $images = $user->images()->latest()->get();

        return view('users.show', [
            'user' => $user,
            'images' => $images
        ]);
    }
}
