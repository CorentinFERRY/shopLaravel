<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showForm(){
        return view('auth.register');
    }

    public function register(AuthRegisterRequest $request){

        //Création de l'utilisateur avec les données préparées auparavant
        $user = User::create($request->validated()->userData());
        
        //Connexion automatique  
        Auth::login($user);
        return redirect() 
                ->route('home') 
                ->with('success', 'Compte crée avec succès ! ');
        
    }
}
