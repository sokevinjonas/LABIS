<?php

namespace App\Http\Controllers\Presence;

use DateTime;
use App\Models\User;
use App\Models\Presence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ListePresencController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {   
        $id =  Auth::user()->id;
        $presence = Presence::where('user_id', $id)
                                ->latest()
                                ->paginate(5);
        foreach ($presence as $data) {
            $data->date_du_jour = new DateTime($data->date_du_jour);
            $heureDepart = new DateTime($data->heure_depart);
            $heureArrivee = new DateTime($data->heure_arriver);
            $difference = $heureDepart->diff($heureArrivee);
            $data->duree = $difference->format('%H:%I');
        }

        $nbr_H = $presence->count();
        return view('users.liste_presence', [
            'presence' => $presence,
            'nbr_H' => $nbr_H,
        ]);
    }
}