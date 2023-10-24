<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class LoginRegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Valideer de invoer van het formulier
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed', // Hier wordt bevestigd dat het wachtwoord overeenkomt met 'password_confirmation' veld
        ]);

        // Maak een nieuwe gebruiker aan
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Log de nieuwe gebruiker in
        Auth::login($user);

        // Stuur de gebruiker door naar het dashboard of een andere gewenste bestemming
        return redirect()->route('home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log de huidige gebruiker uit

        // Stuur de gebruiker door naar de gewenste bestemming na uitloggen (bijv. de inlogpagina)
        return redirect()->route('login');
    }
}
