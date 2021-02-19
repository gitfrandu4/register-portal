<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function register() {
        return view('auth.register');
    }

    function create(Request $request){
        // Validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        // If vorm validated successfuly, then register new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();

        if($query){
            return back()->with('success', "¡Se ha registrado correctamente! :D"); 
        } else {
            return back()->with('fail', "¡Oops! Algo no ha ido bien... :("); 
        }
    }

    function check(Request $request){
        // Validate Requests
        $request->validate([
            'email'=>"required|email",
            'password'=>"required|min:5|max:12"
        ]);
    }
}
