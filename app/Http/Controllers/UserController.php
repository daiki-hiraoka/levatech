<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users.index')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
}
