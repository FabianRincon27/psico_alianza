<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator, Str, Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){

        $messages = [
            'username.required' => 'Debe ingresar un usuario',
            'password.required' => 'Debe ingresar una contraseña'
        ];

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], $messages);

        $remember = $request->filled('remember');

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)):
            return redirect()->route('home');
        else:
            return back()->with('message', 'El nombre de usuario o la contraseña son incorrectos, verifíquelo e inténtelo de nuevo.')
                        ->with('type-alert', 'alert-danger')
                        ->with('icon','mdi-block-helper')
                        ->withInput();
        endif;
    }
}
