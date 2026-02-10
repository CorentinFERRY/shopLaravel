<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm(){
        return view('auth.login');
    }

    public function login(AuthLoginRequest $request){
        // Validation par le FormRequest en amont
         if (Auth::attempt(
            $request->credentials(),
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();
            return redirect()
                ->intended('/')
                ->with('success', 'Connexion réussie !');
        }
        return back()
            ->withErrors([
                'email' => 'Identifiants incorrects.',
            ])
            ->onlyInput('email'); //Seulement le mail est remis après l'echec de connexion
    }
}
