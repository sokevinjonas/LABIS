<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EnregistrerPresenceRequest;

class PresenceController extends Controller
{   
    public function EnregistrePresence(EnregistrerPresenceRequest $request)
    {
        try {
            // Récupérer la date et l'heure actuelles
            $datejour = Carbon::now()->format('Y-m-d');
            $heureDepart = Carbon::now()->format('H:i');

            // Récupérer l'ID de l'utilisateur connecté
            $userLog = Auth::user()->id;

            // Valider les données de la requête
            $validate  = $request->validated();
            
            // Vérifier si l'heure d'arrivée est comprise entre 6h et 18h
            $heureArriver = $validate['heure_arriver'];
            $heureArriverObj = Carbon::createFromFormat('H:i', $heureArriver);
            $heureDebut = Carbon::createFromTime(6, 0); // 6h du matin
            $heureFin = Carbon::createFromTime(18, 0);   // 18h le soir
            if (!$heureArriverObj->between($heureDebut, $heureFin)) {
                // Si l'heure d'arrivée n'est pas dans la plage horaire spécifiée, afficher un message d'erreur et arrêter le processus
                notyf()->ripple(true)->addError('L\'heure d\'arrivée doit être comprise entre 6h et 18h.');
                return redirect()->back();
            }

            // Créer une instance de Presence
            $presence = new Presence();

            // Assigner les valeurs aux propriétés de Presence
            $presence->heure_arriver = $heureArriver;
            $presence->motif = $validate['motif'];
            $presence->heure_depart = $heureDepart;
            $presence->date_du_jour = $datejour;
            $presence->user_id = $userLog;

            // Vérifier si heure_arriver est inférieur à heure_depart
            if ($presence->heure_arriver >= $presence->heure_depart) {
                // Si heure_arriver n'est pas inférieur à heure_depart, afficher un message d'erreur et arrêter le processus
                notyf()->ripple(true)->addError('L\'heure d\'arrivée doit être antérieure à l\'heure de départ.');
                return redirect()->back();
            }

            // Sauvegarder la présence
            $presence->save();

            // Si tout se passe bien, afficher un message de succès et rediriger
            notyf()->ripple(true)->addSuccess('Votre présence a été prise en compte.');
            return redirect()->back();
        } catch (\Exception $th) {
            // En cas d'erreur, afficher un message d'erreur et rediriger
            notyf()->ripple(true)->addError('Opération échouée.');
            return redirect()->back();
        }
    }

}