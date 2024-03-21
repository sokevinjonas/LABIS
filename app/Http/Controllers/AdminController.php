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
        $users = User::where('id', '!=',  $id)->latest()->paginate(3);
        // dd($users->toSql());
        // dd($users);
        return view('admin.liste_user',[
            'users' => $users]);
    }

    //Nb: cette fonction affiche la liste de toutes les presences cotes Admin
    public function listOPresence() : View
    {

        $presenceExistante = Presence::peutEnregistrerAujourdhui();
        $presences = Presence::latest()->paginate(2);
        $users = User::all();
        return view('admin.presences.liste_presence', [
            'presences' => $presences,
            'presenceExistante' => $presenceExistante,
            'users' => $users,

        ]);
    }

    public function SearchUser(Request $request){
        $search = $request->search;
        $users = User::where(function($query) use ($search){
            $query->where('nom','like',"%$search%")
                ->orWhere('sexe','like',"%$search%")
                ->orWhere('telephone','like',"%$search%");
        })
        ->paginate(10);

        // Vérifier si la recherche n'a retourné aucun résultat
        if ($users->isEmpty()) {
            session()->flash('message', 'Aucun résultat trouvé pour votre recherche.');
        }

        return view('admin.liste_user', compact('users','search'));
    }

    public function FilterUser(Request $request){
        $nom = $request->nom;
        $sexe = $request->sexe;

        $telephone = $request->telephone;

        $users = User::where(function($query) use ($nom, $sexe,$telephone){
            if ($nom) {
                $query->where('nom', 'like', "%$nom%");
            }

            if ($sexe) {
                $query->where('sexe', 'like', "%$sexe%");
            }

            if ($telephone) {
                $query->where('telephone', 'like', "%$telephone%");
            }
        })
        ->paginate(20);

        // Vérifier si la recherche n'a retourné aucun résultat
        if ($users->isEmpty()) {
            session()->flash('message', 'Aucun résultat trouvé pour votre recherche.');
        }

        // Rediriger vers l'index sans les paramètres de recherche
        return view('admin.liste_user', compact('nom','sexe','users'));
    }

    public function SearchPresence(Request $request)
{
    $search = $request->search;

    $presenceExistante = Presence::peutEnregistrerAujourdhui();

    $users = User::all();
    $presences = Presence::with('users')
        ->where(function($query) use ($search) {
            $query->whereHas('users', function($query) use ($search) {
                $query->where('nom', 'like', "%$search%")
                    ->orWhere('sexe', 'like', "%$search%")
                    ->orWhere('telephone', 'like', "%$search%");
            });
        })
        ->paginate(20);

    // Vérifier si la recherche n'a retourné aucun résultat
    if ($presences->isEmpty()) {
        session()->flash('message', 'Aucun résultat trouvé pour votre recherche.');
    }

    return view('admin.presences.liste_presence', compact('presences', 'search','presenceExistante','users'));
}


public function FilterPresence(Request $request)
{
    $nom = $request->nom;
    $sexe = $request->sexe;
    $date_du_jour = $request->date_du_jour;

    $presenceExistante = Presence::peutEnregistrerAujourdhui();
    $users = User::all();

    $presences = Presence::where(function($query) use ($nom, $sexe, $date_du_jour) {
        if ($nom) {
            $query->whereHas('users', function($query) use ($nom) {
                $query->where('nom', 'like', "%$nom%");
            });
        }

        if ($sexe) {
            $query->whereHas('users', function($query) use ($sexe) {
                $query->where('sexe', 'like', "%$sexe%");
            });
        }



        if ($date_du_jour) {
            $query->where('date_du_jour', 'like', "%$date_du_jour%");
        }


    })
    ->paginate(10);

    // Vérifier si la recherche n'a retourné aucun résultat
    if ($presences->isEmpty()) {
        session()->flash('message', 'Aucun résultat trouvé pour votre recherche.');
    }

    return view('admin.presences.liste_presence', compact('nom', 'sexe', 'presences','presenceExistante','users'));
}

public function DeleteUser($id){

    User:: findOrFail($id)->delete();


    $notification = array(
        'message' => 'user supprimé avec succès',
        'alert-type' => 'success'
    );


    // return redirect()->route('all.Arme')->with($notification);
    return redirect()->route('listeUser')->with($notification);

}





}
