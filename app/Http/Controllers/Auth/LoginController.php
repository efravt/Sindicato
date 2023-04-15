<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Vista de Formulario de Login - Inicio de Sesión
     */
    public function showLoginForm(){
        return view('auth.login');
    }
    /**
     * Verificación de intento de Usuario
     * method: POST
     */
    public function login_attemps(Request $request)
    {
        $date = Carbon::now();

        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            //Correo electronico incorrecto
            $data['state'] = 'email';
            $data['msg']   = 'Email incorrecto.';
            return $data;
        } elseif($user->estado == 0){
            //Verificacion de activación de Usuario (En caso de Deshabilitar servicio)
            $data['state'] = 'inactive';
            $data['msg']   = 'Usuario deshabilitado.';
            return $data;
        }elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //Verificacion de Email y Contraseña
            //cuando los datos son correctos
            $user->save();
            $data['state'] = 'success';
            return $data;
        } else {
            $data['state']       = 'password';
            $data['msg']         = 'Contraseña incorrecta.';
            $user->save();
            return $data;
        }

    }
    /**
     * Cierre de Sesión del Sistema
     * Type: POST
     * URL: logout
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
