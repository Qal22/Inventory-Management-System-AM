<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.registerPage');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255',
            'confirmpassword' => 'required|min:6|max:255'
        ]);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfull. You can login now');
    }
}
