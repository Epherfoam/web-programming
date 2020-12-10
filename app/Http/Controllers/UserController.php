<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function viewAllUser()
    {
        $users = User::all();
        return view('alluser', compact('users'));
    }
}
