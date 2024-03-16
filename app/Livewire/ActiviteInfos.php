<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Activite;
use Illuminate\Support\Facades\Auth;
use App\Models\ParticipationActivite;

class ActiviteInfos extends Component
{
    public $activity;
    public $search = '';

    public function mount()
    {
        // Initialiser les activités
        $this->activity = Activite::where('etat', 'active')->latest()->get();
    }
    
    public function render()
    {   
        $this->activity = Activite::where('etat', 'active')
                ->when(!empty($this->search), function($query) {
                    return $query->where('titre', 'LIKE', "%{$this->search}%")
                        ->orWhere('description', 'LIKE', "%$this->search%");
                    })->latest()->get();
        return view('livewire.activite-infos');
    }
}