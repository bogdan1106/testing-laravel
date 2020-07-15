<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthorizeController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }


    public function register(Request $request ){
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users|required',
            'password' => 'required',
        ]);
       $user = User::add($request->all());
       $user->generatePassword($request->password);

       return redirect('/');
    }

    public function loginForm()
    {
        return view('pages.login');
    }
}
