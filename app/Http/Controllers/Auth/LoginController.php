<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // Verifica que el usuario ademas este Habilitado para autenticarse
    protected function attemptLogin(Request $request)
    {
        // Obtener las credenciales del formulario
        $credentials = $this->credentials($request);

        // Verificar si el estado es "Habilitado"
        $credentials['estado'] = 'Habilitado';



        // Intentar autenticar al usuario
        return $this->guard()->attempt(
            $credentials,
            $request->filled('remember')
        );
    }
}
