<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EnregistrerPresenceRequest;

class PresenceController extends Controller
{   
     //Nb: cette fonction permet de faire l'enregistrement de presence pour un utilisateur simple
    public function EnregistrePresence(EnregistrerPresenceRequest $request)
    {   
        try {
            $datejour = Carbon::now()->format('Y-m-d');
            $heureDepart = Carbon::now()->format('H:i');
            // dd($datejour, $heureDepart);
            $userLog = Auth::user()->id;

            // dd($request->all());
            $validate  = $request->validated();
            
            $presence = new Presence();
            $presence->heure_arriver = $validate['heure_arriver'];
            $presence->motif = $validate['motif'];
            $presence->heure_depart = $heureDepart;
            $presence->date_du_jour = $datejour;
            $presence->user_id = $userLog;

            $presence->save();
            notyf()->ripple(true)->addSuccess('Votre présence a été prise en compte.');
            return redirect()->back();
        } catch (\Exception $th) 
        {   
            notyf()->ripple(true)->addError('Opération echoué.');
            // dd($th->getMessage());
            return redirect()->back();
        }
    }
}