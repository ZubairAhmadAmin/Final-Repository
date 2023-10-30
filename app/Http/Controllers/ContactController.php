<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ContactController extends Controller
{
    public function index () {
        return view('Frontend.pages.contact');
    }

    public function send (Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);
    }


}
