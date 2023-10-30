<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;


class CustomAuthController extends Controller
{
    public function login () {
        return view("Frontend.auth.login");
    }

    public function register () {
        return view("Frontend.auth.register");
    }

    public function registerUser (Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        $user= new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res) {
            return back()->with('success', 'you have registered successfuly');
        }
        else {
            return back()->with('fail', 'Something wrong');
        }
    }

    public function loginUser (Request $request) {
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user) {
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }
            else {
                return back()->with('fail', 'Password not matches!');
            }
        }
        else {
            return back()->with('fail', 'This email is not registered!');
        }
    }
//     public function index () {
//         $data = array();
//         if(Session()->has('loginId')) {
//             $data = User::where('id', '=', Session()->get('loginId'))->first();   
//         }
//         return view('Backend.layouts.master', compact('data'));
//     }
}
