<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UdapteUserRequest;
use App\Http\Requests\PhotoUpdateRequest;

class ProfileController extends Controller
{   
    //Nb: cette fonction permet de afficher la vue pour My profile
    public function AffichageProfile()
    {   
        $user = Auth::user();
        $Countpresence = Presence::where('user_id', $user->id)->count();
        // dd($Countpresence);
        return view('users.my_profile', [
            'user' => $user,
            'Countpresence' => $Countpresence
        ]);
    }
    //Nb: cette fonction permet de mettre a jour les infos du profile
    public function UpdateUserProfile(UdapteUserRequest $request)
    {
        try {
            // dd($request->all());
        $id = Auth::user()->id;
        $validate  = $request->validated();

        $user = User::find($id);
        $user->nom  = $validate['nom'];
        $user->email  = $validate['email'];
        $user->telephone  = $validate['telephone'];
        $user->whatsapp  = $validate['whatsapp'];
        $user->sexe  = $validate['sexe'];
        $user->profession  = $validate['profession'];
        $user->bio  = $validate['bio'];

        $user->save();
        notyf()->ripple(true)->addSuccess('Votre profile a été mise à jour avec succès.');
            return redirect()->back();
            
        } catch (Exception $th) {
            // dd($th->getMessage());
            notyf()->ripple(true)->addError('Une erreur s\'est produite lors de la mise à jour.');
            return redirect()->back();
        }
    }

     //Nb: cette fonction permet de mettre a jour ou ajouter une nouvelle photo
    public function UpdatePhoto(PhotoUpdateRequest $request)
    {   
        try {
            $validated = $request->validated();

            // Chargez l'utilisateur actuellement authentifié
            $user = Auth::user();

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                
                // Générez un nom unique pour l'image en utilisant le timestamp
                $imageName = time().'.'.$image->getClientOriginalExtension();
                
                // Stockez l'image dans le dossier 'photo_profile' du stockage public
                $image->storeAs('photo_profile', $imageName, 'public');

                // Enregistrez le nom du fichier dans la base de données
                $user->photo = $imageName;
                $user->save(); 
            }
            notyf()->ripple(true)->addSuccess('Photo mise à jour avec succès.');

            return redirect()->back();
        } catch (Exception $th) {
            // dd($th->getMessage());
            notyf()->ripple(true)->addError('Une erreur s\'est produite lors de la mise à jour de la photo.');
            return redirect()->back();
        }
    }

     //Nb: cette fonction permet de deconnecter un utilisateur
    public function Logout()
    {
        Auth::logout();
    
        return redirect()->route('sign');
    }

    public function fiche_renseigement(){
        return view('users.fiche_renseignements');
    }
}