<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FicheRenseignement;
use Illuminate\Support\Facades\Auth;

class FicheRenseignements extends Component
{   
    public $user;
    public $startEtap = 1;
    public $endtEtap = 6;

    // Les propriétés de données du formulaire 1
    public $date_naissance;
    public $lieu_naissance;
    public $nationalite;
    // Les propriétés de données du formulaire 2
    public $pays_residence;
    public $ville_residence;
    public $adresse_residence;
    public $residence_type;
    public $autre_residence_type;
    // Les propriétés de données du formulaire 3
    public $financierement;
    // Les propriétés de données du formulaire 4
    public $niveau_etude;
    public $diplome;
    public $engagement_associatif;
    public $experience_professionnelle;
    // Les propriétés de données du formulaire 5
    public $connaissance_informatique;
    public $connaissance_linguistique;
    // Les propriétés de données du formulaire 6
    public $projet_personnel;
    public $connaissance_programme;
    public $attente_abis;
    public $competence_experience_abis;


    
    public function mount()
    {   
        $this->profileUser();
        $this->startEtap = 1;
        $this->endtEtap = 6;

    }
    private function profileUser()
    {
        $this->user = Auth::user();
    }

    public function increment()
    {   
        $this->validateData();
        $this->resetErrorBag();
        $this->startEtap++;
        if($this->startEtap > $this->endtEtap)
        {
            $this->startEtap = $this->endtEtap;
        }
    }
    public function decrement()
    {   
        $this->resetErrorBag();
        $this->startEtap--;
        if($this->startEtap < 1)
        {
            $this->startEtap = 1;
        }
    }

    public function validateData()
    {
        $customMessages = [
            // -------------Etape 1------------------
            'date_naissance.required' => 'Le champ Date de naissance est obligatoire.',
            'nationalite.required' => 'Le champ Nationalité de est obligatoire.',
            'lieu_naissance.required' => 'Le champ Lieu de naissance est obligatoire.',
            // ------------Etape 2 ------------------
            'pays_residence.required' => 'Le champ pays de résidence est obligatoire.',
            'ville_residence.required' => 'Le champ ville de résidence est obligatoire.',
            'adresse_residence.required' => 'Le champ secteur/quartier de résidence est obligatoire.',

            // ------------Etape 3------------------
            'financierement.required' => 'Le champ Financement est obligatoire.',
            // -------------Etape 4--------------- 
            'niveau_etude.required' => 'Le champ Niveau d\'etude est obligatoire.',
            'diplome.required' => 'Le champ diplome est obligatoire.',
            'experience_professionnelle.required' => 'Le champ Experience professionnelle est obligatoire.',
            'engagement_associatif.required' => 'Le champ Engagement est obligatoire.',
            // -------------Etape 5--------------- 
            'connaissance_linguistique.required' => 'Le champ Connaissance linguistique est obligatoire.',
            'connaissance_informatique.required' => 'Le champ Connaissance informatique est obligatoire.',
            // -------------Etape 6 --------------- 


        ];
        if ($this->startEtap == 1) {
            $this->validate([
                'date_naissance' => 'required',
                'lieu_naissance' => 'required',
                'nationalite' => 'required',
            ],
            $customMessages
        );
        } elseif ($this->startEtap == 2) {
            $this->validate([
                'pays_residence' => 'required',
                'ville_residence' => 'required',
                'adresse_residence' => 'required',
                'residence_type' => 'required_without:autre_residence_type',
                'autre_residence_type' => 'required_without:residence_type',
            ],
            $customMessages
        );
        } elseif ($this->startEtap == 3) {
            $this->validate([
                'financierement' => 'required',
            ],
            $customMessages
        );
        } elseif ($this->startEtap == 4) {
            $this->validate([
                'niveau_etude' => 'required',
                'diplome' => 'required',
                'experience_professionnelle' => 'required',
                'engagement_associatif' => 'required',
            ],
            $customMessages
        );
        } elseif ($this->startEtap == 5) {
            $this->validate([
                'experience_professionnelle' => 'required',
                'engagement_associatif' => 'required',
            ],
            $customMessages
        );
        } elseif ($this->startEtap == 6) {
            $this->validate([
                'projet_personnel' => 'nullable',
                'connaissance_programme' => 'nullable',
                'attente_abis' => 'nullable',
                'competence_experience_abis' => 'nullable',
            ],
            $customMessages
        );
        }
    }
    public function ficheRenseignement()
    {       
        $this->resetErrorBag();
        $this->validateData(); // Validez les données avant de sauvegarder dans la base de données

        $data = [
            'date_naissance' => $this->date_naissance,
            'financierement' => $this->financierement,
            'lieu_naissance' => $this->lieu_naissance,
            'pays_residence' => $this->pays_residence,
            'ville_residence' => $this->ville_residence,
            'adresse_residence' => $this->adresse_residence,
            'niveau_etude' => $this->niveau_etude,
            'diplomes' => $this->diplome,
            'experience_professionnelle' => $this->experience_professionnelle,
            'engagement_associatif' => $this->engagement_associatif,
            'connaissance_informatique' => $this->connaissance_informatique,
            'connaissance_linguistique' => $this->connaissance_linguistique,
            'projet_personnel' => $this->projet_personnel,
            'connaissance_programme' => $this->connaissance_programme,
            'attente_abis' => $this->attente_abis,
            'competence_experience_abis' => $this->competence_experience_abis,
            'user_id' => Auth::user()->id,
        ];

        if ($this->residence_type === 'Autre') {
            $data['autre_residence_type'] = $this->autre_residence_type;
        } else {    
            $data['residence_type'] = $this->residence_type;
        }

        // Insérer l'enregistrement dans la base de données
        FicheRenseignement::create($data);

        // Réinitialiser certaines propriétés si nécessaire (à ajuster en fonction de votre logique)
        // $this->reset($data);
        $this->reset([
            'date_naissance', 
            'financierement', 
            'lieu_naissance', 
            'pays_residence', 
            'ville_residence', 
            'adresse_residence', 
            'residence_type', 
            'autre_residence_type',
            'niveau_etude',
            'diplomes',
            'experience_professionnelle',
            'engagement_associatif',
            'connaissance_linguistique',
            'projet_personnel',
            'attente_abis',
            'competence_experience_abis',

        ]);

        notyf()->ripple(true)->addSuccess('L\'enregistrement a été effectué avec succès.');
        $this->startEtap = 1;
    }

    public function render()
    {
        return view('livewire.fiche-renseignements');
    }
}