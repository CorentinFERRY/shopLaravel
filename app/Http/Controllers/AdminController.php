<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
 
    public function dashboard ()
    {
        // Tableau de bord admin
        return view('admin.dashboard');
    }

    public function listUsers()
    {
        // Liste des utilisateurs
        return "Liste des utilisateurs :";
    }
}
