<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activite;
use Illuminate\Support\Facades\Auth;
use App\Models\ParticipationActivite;

class ActiviteItem extends Component
{
    public $data;
    public $utilisateurAdejaParticipe;

    public function mount($data)
    {
        $this->data = $data;
        $this->utilisateurAdejaParticipe = $this->utilisateurAdejaParticipe();
    }

    public function participate($activityId)
    {
        $user = Auth::user();

        // Mettez à jour la valeur dynamiquement
        $this->utilisateurAdejaParticipe = $this->utilisateurAdejaParticipe();

        if (!$this->utilisateurAdejaParticipe) {
            $val = ParticipationActivite::create([
                'activite_id' => $activityId,
                'user_id' => $user->id,
            ]);
            notyf()->ripple(true)->addSuccess('Opération réussie.');
            $this->utilisateurAdejaParticipe = true;
        } else {
            
            notyf()->ripple(true)->addError('Opération échouée.');
        }
    }

    public function utilisateurAdejaParticipe()
    {
        $user = Auth::user();
        // Vérifiez si l'utilisateur a déjà participé à cette activité
        $participation = ParticipationActivite::where('activite_id', $this->data->id)
                        ->where('user_id', $user->id)
                        ->exists();
        return $participation;
    }
    public function render()
    {
        return view('livewire.activite-item');
    }
}