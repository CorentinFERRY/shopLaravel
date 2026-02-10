<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request){

        // Déconnexion de l'utilisateur
        Auth::logout();

        // Invalidation de la session
        $request->session()->invalidate();

        // Régénération du token CSRF
        $request->session()->regenerateToken();

        // Redirection avec message flash
        return redirect('/')
            ->with('success', 'Vous avez été déconnecté avec succes !');

    }
}
