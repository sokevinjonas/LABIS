<?php

namespace App\Http\Controllers\Activites;

use App\Http\Controllers\Controller;
use App\Models\Activite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActiviteController extends Controller
{
    public function activiteListe(){

        $activites = Activite::latest()->paginate(4);


        return view('activites.liste_activite',compact('activites'));
    }

    public function activiteCreate(){

    }

    // fonction pour publié une activite

    public function publierActivite($id) {
        // Récupérez l'activité par son ID
        $activite = Activite::findOrFail($id);
        // Mettez à jour l'état de l'arme à 1
        $activite->update(['etat' => 'active']);

        notyf()->ripple(true)->addSuccess('Votre activité a été publiée .');
            return redirect()->back();

        // return redirect()->route('gestionnaire.armes.all.arme')->with($notification);
    }

// fonction pour retirer une activite
    public function retirerActivite($id) {
      // Récupérez l'activité par son ID
      $activite = Activite::findOrFail($id);
      // Mettez à jour l'état de l'arme à 1
      $activite->update(['etat' => 'inactive']);

      notyf()->ripple(true)->addSuccess('Votre activité a été rétirée.');
          return redirect()->back();

    }


    public function storeActivite(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'date_debut' => 'required',
            'date_fin' => 'required'
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/activites/';
            $file->move($path, $filename);
        }

        Activite::create([
            'titre' => $request->titre,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'description' => $request->description,
            'image' => $path.$filename,
        ]);

        notyf()->ripple(true)->addSuccess('Votre activité a été créée avec succès.');
        return redirect()->back();
    }


    public function editActivite(int $id)
    {
        $category = Activite::findOrFail($id);
        return view('category.edit', compact('category'));
    }


            // methode pour modifier

    public function updateActivite(Request $request, int $id)
    {
        $request->validate([
            'titre' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp',
            'date_debut' => 'required',
            'date_fin' => 'required'
        ]);

        $activite = Activite::findOrFail($id);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/activites/';
            $file->move($path, $filename);

            if(File::exists($activite->image)){
                File::delete($activite->image);
            }
        }

        $activite->update([
            'titre' => $request->titre,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'description' => $request->description,
            'image' => $path.$filename,
        ]);

        notyf()->ripple(true)->addSuccess('Votre activité a été modifiée avec succès.');
        return redirect()->back();    }

        // methode pour supprimer
    public function destroyActivite(int $id)
    {
        $activite = Activite::findOrFail($id);
        if(File::exists($activite->image)){
            File::delete($activite->image);
        }

        $activite->delete();

        notyf()->ripple(true)->addSuccess('Votre activité a été supprimée avec succès.');
        return redirect()->back();
    }



}
