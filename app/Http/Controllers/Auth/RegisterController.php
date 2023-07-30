<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){

        $messages = [
            'name.required' => 'Debe ingresar un nombre',
            'username.required' => 'Debe ingresar un usuario',
            'email.required' => 'Debe ingresar un correo electrónico',
            'email.email' => 'Debe ingresar una dirección correo electrónico valida',
            'email.unique' => 'Ya existe un usuario con este correo electrónico',
            'password.required' => 'Debe ingresar una contraseña'
        ];

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ], $messages);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login.get')->with('message', 'Usuario creado con éxito, ahora puede iniciar sesión.')
                ->with('type-alert', 'alert-success')
                ->with('icon', 'mdi-check-all');
    }
}
