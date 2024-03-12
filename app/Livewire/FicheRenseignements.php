<?php

namespace App\Livewire;

use Livewire\Component;

class FicheRenseignements extends Component
{   
    public $startEtap = 1;
    public $endtEtap = 6;


    public function mount()
    {
        $this->startEtap = 5;
        $this->endtEtap = 6;

    }

    public function increment()
    {
        $this->startEtap++;
        if($this->startEtap > $this->endtEtap)
        {
            $this->startEtap = $this->endtEtap;
        }
    }
    public function decrement()
    {
        $this->startEtap--;
        if($this->startEtap < 1)
        {
            $this->startEtap = 1;
        }
    }

    public function render()
    {
        return view('livewire.fiche-renseignements');
    }
}