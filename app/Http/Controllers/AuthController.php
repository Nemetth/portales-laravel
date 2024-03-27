<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'Ingrese un correo electrónico válido.',
            'password.required' => 'El campo de contraseña es obligatorio.',
        ]);

        $credentials = $request->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return redirect()
                ->route('auth.login.form')
                ->with('status.message', 'Por favor, corrija sus credenciales')
                ->withInput();
        }

        return redirect()
            ->route('home');
            /* ->with('status.message', '¡Bienvenido hechizero ' . Auth::user()->email . '!'); */
    }

    public function logoutProcess(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login.form');
/*             ->with('status.message', 'Haz atravesado el portal de salida.'); */
    }

    //Registro

    public function registerForm()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
/*             'name' => 'required', */
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ], [
/*             'name.required' => 'El campo de nombre es obligatorio.', */
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'Ingrese un correo electrónico válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'El campo de contraseña es obligatorio.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $user = new User;
        $user->role = 2;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        return redirect()
            ->route('home');
/*             ->with('status.message', '¡Bienvenido hechizero ' . Auth::user()->email . '!'); */
    }
}
