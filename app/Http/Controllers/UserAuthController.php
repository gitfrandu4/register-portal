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

        // If form validated successfully, then process login
        $user = User::where('email', "=", $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                
                // If password match, then redirect user to profile
                $request->session()->put('LoggedUser', $user->id);
                return redirect('profile');
            } else {
                return back()->with('fail', 'La contraseña no es válida. D:');
            }
        } else {
            return back()->with('fail', 'No se ha encontrado ninguna cuenta asociada a esta dirección de correo. D:');
        }
    }

    function profile() {

        if(session()->has('LoggedUser')){
            $user = User::where('id', '=', session('LoggedUser'))->first();
            
            $data = [
                'LoggedUserInfo' => $user
            ];
        }

        return view('admin.profile', $data);
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
