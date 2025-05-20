<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function register(Request $request)
    {
        // return $request->all(); // Devuelve los datos que ha introducido el usuario en el form

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|max:6',
            'password_confirmation' => 'required'
        ]);

        $user = new User();
        // name de la izquierda es el nombre del campo de la tabla, y el de la derecha es el del input del form
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save(); // Guarda el usuario

        Auth::login($user);
        return redirect()->route('contenido');
    }
    public function login(Request $request)
    {
        // Obtenemos las credenciales
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Si está marcado el check será igual a true, sino false
        $remember = ($request->has('remember') ? true : false);

        // Si las credenciales son correctas se generará la sesión y nos redirigirá al contenido
        if (Auth::attempt($credenciales, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('contenido');
        } else {
            return back()->withErrors([
                'email' => 'Las credenciales ingresadas no son correctas'
            ])->onlyInput('email');
        }
    }
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
