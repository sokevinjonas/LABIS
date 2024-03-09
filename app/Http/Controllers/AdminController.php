<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Presence;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   
    //Nb: cette fonction affiche le tableau de board que ca soit admin ou users simple
    public function dashboard() : View
    {   
        $presenceExistante = Presence::peutEnregistrerAujourdhui();
        return view('welcome',[
        'presenceExistante' => $presenceExistante
        ]);
    }

    //Nb: cette fonction affiche la liste de tous les utilisateurs cotes Admin
    public function listOfUser() : View
    {   
        $id = Auth::user()->id;
        // dd($id);
        $users = User::where('id', '!=',  $id)->latest()->get();
        // dd($users->toSql());    
        // dd($users);         
        return view('admin.liste_user',[
            'users' => $users]);
    }

    //Nb: cette fonction affiche la liste de toutes les presences cotes Admin
    public function listOPresence() : View
    {   
        $presences = Presence::latest()->paginate(10);
        return view('admin.presences.liste_presence', [
            'presences' => $presences
        ]);
    }

    
}