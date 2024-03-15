<div>
    {{-- @dump($this) --}}
    <div class="container-fluid">
        <form wire:submit.prevent="ficheRenseignement">
            <div class="single_wrap">
                <div class="step-four">
                    @if ($startEtap == 1)
                        <div class="card">
                            <div class="card-header bg-success fs-4 text-white text-center">Etape
                                {{ $startEtap }}/{{ $endtEtap }} - Identification</div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="form-group row">
                                        <label for="date_naissance" class="col-sm-2 col-form-label">Date de
                                            naissance</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="date_naissance"
                                                wire:model="date_naissance">
                                            @error('date_naissance')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nationalite" class="col-sm-2 col-form-label">Nationalité</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nationalite"
                                                wire:model="nationalite">
                                            @error('nationalite')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lieu_naissance" class="col-sm-2 col-form-label">Lieu de
                                            Naissance</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lieu_naissance"
                                                wire:model="lieu_naissance" placeholder="Pays/Region/Province/Village">
                                            @error('lieu_naissance')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($startEtap == 2)
                        <div class="card">
                            <div class="card-header bg-success fs-4 text-white text-center">Etape
                                {{ $startEtap }}/{{ $endtEtap }}
                                - Contact/Adress
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="form-group row">
                                        <label for="pays_residence" class="col-sm-2 col-form-label">Pays de résidence
                                            actuelle</label>
                                        <div class="col-sm-10">
                                            <input type="text" wire:model="pays_residence" class="form-control"
                                                id="pays_residence" placeholder="Pays de résidence">
                                            @error('pays_residence')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ville_residence" class="col-sm-2 col-form-label">Ville de résidence
                                            actuelle</label>
                                        <div class="col-sm-10">
                                            <input type="text" wire:model="ville_residence" class="form-control"
                                                id="ville_residence" placeholder="Ville de résidence">
                                            @error('ville_residence')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="adresse_residence"
                                            class="col-sm-2 col-form-label">Secteur/Quartier/Village de residence:
                                            actuelle</label>
                                        <div class="col-sm-10">
                                            <input type="text" wire:model="adresse_residence" class="form-control"
                                                id="adresse_residence"
                                                placeholder="Secteur/Quartier/Village de residence">
                                            @error('adresse_residence')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="residence_type" class="col-sm-2 col-form-label">Vous
                                            résidez?</label>
                                        <div class="col-sm-10">
                                            <!-- Options de résidence -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    wire:model="residence_type" id="residenceType1"
                                                    value="Dans une résidence qui vous appartient">
                                                <label class="form-check-label" for="residenceType1">Dans une résidence
                                                    qui vous appartient</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" wire:model="residence_type"
                                                    value="Chez vos parents directs (père, mère, soeur, frère)"
                                                    type="radio" name="residenceType" id="residenceType2">
                                                <label class="form-check-label" for="residenceType2">Chez vos parents
                                                    directs (père, mère, soeur, frère)</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" wire:model="residence_type"
                                                    value="Chez d'autres membres de votre famille" type="radio"
                                                    name="residenceType" id="residenceType3">
                                                <label class="form-check-label" for="residenceType3">Chez d'autres
                                                    membres de votre famille</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" wire:model="residence_type"
                                                    value="Logement partagé avec des amis" type="radio"
                                                    name="residenceType" id="residenceType4">
                                                <label class="form-check-label" for="residenceType4">Logement partagé
                                                    avec des amis</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" wire:model="residence_type"
                                                    value="Autre" type="radio" name="residenceType"
                                                    id="residenceType5">
                                                <label class="form-check-label" for="residenceType5">Autre</label>
                                                <!-- Champ "Autre" avec placeholder -->
                                                <input type="text" wire:model="autre_residence_type"
                                                    id="autre_residence_type" class="form-control mt-2"
                                                    placeholder="Précisez">
                                            </div>
                                            <!-- Affichage des erreurs de validation -->
                                            @error('residence_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            @error('autre_residence_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @elseif ($startEtap == 3)
                        <div class="card">
                            <div class="card-header bg-success fs-4 text-white text-center">Etape {{ $startEtap }}/
                                {{ $endtEtap }}
                                - Situation
                                Financiere/Professionelle
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="form-group row">
                                        <label for="financierement" class="col-sm-2 col-form-label">Êtes-vous
                                            financièrement indépendant?</label>
                                        <div class="col-sm-10">
                                            <!-- Options pour la question financière -->
                                            <div class="form-check">
                                                <input class="form-check-input" value="1" type="radio"
                                                    wire:model="financierement" id="financierement_oui">
                                                <label class="form-check-label" for="financierement_oui">Oui</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="0" type="radio"
                                                    wire:model="financierement" id="financierement_non">
                                                <label class="form-check-label" for="financierement_non">Non</label>
                                            </div>
                                            <!-- Affichage des erreurs de validation -->
                                            @error('financierement')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @elseif ($startEtap == 4)
                        <div class="card">
                            <div class="card-header bg-success fs-4 text-white text-center">Etape {{ $startEtap }}/
                                {{ $endtEtap }}
                                - Parcours Scolaire / Professionnelle / Engagement Citoyen
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="form-group row">
                                        <label for="niveau_etude" class="col-sm-2 col-form-label">Quel est votre
                                            niveau
                                            d'étude?</label>
                                        <div class="col-sm-10">
                                            <input type="text" wire:model="niveau_etude" class="form-control"
                                                id="niveau_etude">
                                        </div>
                                        @error('niveau_etude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="diplome" class="col-sm-2 col-form-label">Quelles sont vos
                                            diplomes (y compris qualificatio professionnellle)</label>
                                        <div class="col-sm-10">
                                            <textarea placeholder="NB: N'oubliez pas vos qualification professionnelle" wire:model="diplome" class="form-control"
                                                id="" cols="2" rows="4"></textarea>
                                        </div>
                                        @error('diplome')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="experience_professionnelle"
                                            class="col-sm-2 col-form-label">Quelles sont vos
                                            expériences professionnelle y compris stage et volontariat</label>
                                        <div class="col-sm-10">
                                            <textarea wire:model="experience_professionnelle" placeholder="Nb: Si vous n'avez pas d'experience mettez <<Néant>>"
                                                name="experience_professionnelle" class="form-control" id="" cols="2" rows="4"></textarea>
                                        </div>
                                        @error('experience_professionnelle')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="engagement_associatif" class="col-sm-2 col-form-label">Quels sont
                                            vos
                                            engagements associatifs</label>
                                        <div class="col-sm-10">
                                            <textarea placeholder="Quels sont vos engagements associatifs (nom de l'association, poste occupé et dates)"
                                                wire:model="engagement_associatif" id="engagement_associatif" class="form-control" cols="2"
                                                rows="3"></textarea>
                                        </div>
                                        @error('engagement_associatif')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($startEtap == 5)
                        <div class="card">
                            <div class="card-header bg-success fs-4 text-white text-center">Etape {{ $startEtap }}/
                                {{ $endtEtap }} - DIVERS
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="form-group row">
                                        <label for="connaissance_informatique" class="col-sm-2 col-form-label">Quelles
                                            sont vos connaissances en informatique ? </label>
                                        <div class="col-sm-10">
                                            <textarea placeholder="NB: Si pas de connaissance, mettez Néant" wire:model="connaissance_informatique"
                                                class="form-control" id="connaissance_informatique" cols="2" rows="4"></textarea>
                                        </div>
                                        @error('connaissance_informatique')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="connaissance_linguistique" class="col-sm-2 col-form-label">Quelles
                                            sont vos connaissances linguistiques</label>
                                        <div class="col-sm-10">
                                            <textarea placeholder="Nb: Precisez si parlé, lu , ecrit" wire:model="connaissance_linguistique" class="form-control"
                                                id="connaissance_linguistique" cols="2" rows="4"></textarea>
                                        </div>
                                        @error('connaissance_linguistique')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($startEtap == 6)
                        <div class="card">
                            <div class="card-header bg-success fs-4 text-white text-center">Etape {{ $startEtap }}/
                                {{ $endtEtap }} - Projet Professionnelle et Attente du Labis
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="form-group row">
                                        <label for="projet_personnel" class="col-sm-2 col-form-label">Quel est
                                            votre projet professionnel</label>
                                        <div class="col-sm-10">
                                            <textarea wire:model="projet_personnel" class="form-control" id="projet_personnel" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="connaissance_programme" class="col-sm-2 col-form-label">Comment
                                            avez-vous eu connaissance du Programme Competences pour Demain et du Labis
                                            ?</label>
                                        <div class="col-sm-10">
                                            <textarea wire:model="connaissance_programme" class="form-control" id="connaissance_programme" cols="2"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="attente_abis" class="col-sm-2 col-form-label">Quelles
                                            sont vos attentes vis a vis du LABIS ?</label>
                                        <div class="col-sm-10">
                                            <textarea wire:model="attente_abis" class="form-control" id="attente_abis" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="competence_experience_abis"
                                            class="col-sm-2 col-form-label">Quelles
                                            sont vos
                                            competences et experiences que vous pouvez partager au sein du LABIS</label>
                                        <div class="col-sm-10">
                                            <textarea wire:model="competence_experience_abis" class="form-control" id="competence_experience_abis"
                                                cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    @if ($startEtap == 2 || $startEtap == 3 || $startEtap == 4 || $startEtap == 5)
                        <button type="button" class="btn btn-dart" wire:click="decrement">Retour</button>
                    @endif
                    @if ($startEtap == 1 || $startEtap == 2 || $startEtap == 3 || $startEtap == 4 || $startEtap == 5)
                        <button type="button" class="btn btn-primary" wire:click="increment">Suivant</button>
                    @endif
                    @if ($startEtap == 6)
                        <button type="submit" class="btn btn-success">Envoyer</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
