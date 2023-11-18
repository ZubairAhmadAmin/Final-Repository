<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () {
        if (\Auth::user()->user_type == 2) {
            $users = User::all();

            return view('Backend.dashboard.users', compact('users'));
        }
    
    }
}
