<div>
    <div class="container-fluid">
        <form wire:submit.prevent="storeFormsCandidate">
            <div class="single_wrap">
                <div class="step-four">
                    @if ($startEtap == 1)
                        <div class="card">
                            <div class="card-header bg-success fs-4 text-white text-center">Etape {{ $startEtap }}/
                                {{ $endtEtap }}
                                -
                                Identification
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Votre Nom et
                                            Prenom(s)</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nom" placeholder="Nom">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sexe" class="col-sm-2 col-form-label">Sexe</label>
                                        <div class="col-sm-10">
                                            <select name="sexe" id="sexe" class="form-control">
                                                <option value="">-----</option>
                                                <option value="M">Homme</option>
                                                <option value="F">Femme</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date_naissance" class="col-sm-2 col-form-label">Date de
                                            naissance</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="date_naissance">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nationalite" class="col-sm-2 col-form-label">Nationalité</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nationalite">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nationalite" class="col-sm-2 col-form-label">Lieu de
                                            Naissance</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lieu_naissance">
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
                                        <label for="whatsapp" class="col-sm-2 col-form-label">Contact (WhatsApp)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="nom"
                                                placeholder="WhatsApp">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="whatsapp" class="col-sm-2 col-form-label">Adress E-mail</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="nom"
                                                placeholder="Adress E-mail">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="whatsapp" class="col-sm-2 col-form-label">Pays de résidence
                                            actuelle</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nom"
                                                placeholder="Pays de résidence">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="residenceType" class="col-sm-2 col-form-label">Vous résidez?</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="residenceType"
                                                    id="residenceType1">
                                                <label class="form-check-label" for="residenceType1">
                                                    Dans une résidence qui vous appartient
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="residenceType"
                                                    id="residenceType2" checked>
                                                <label class="form-check-label" for="residenceType2">
                                                    Chez vos parents directs (père, mère, soeur, frère)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="residenceType"
                                                    id="residenceType3">
                                                <label class="form-check-label" for="residenceType3">
                                                    Chez d'autres membres de votre famille
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="residenceType"
                                                    id="residenceType4">
                                                <label class="form-check-label" for="residenceType4">
                                                    Logement partagé avec des amis
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="residenceType"
                                                    id="residenceType5">
                                                <label class="form-check-label" for="residenceType5">
                                                    Autre
                                                </label>
                                                <input type="text" name="" id=""
                                                    class="form-control mt-2" placeholder="Précisez">
                                            </div>
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
                                        <label for="whatsapp" class="col-sm-2 col-form-label">Êtes-vous autonome
                                            financièrement ?</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" value="oui" type="radio"
                                                    name="financierement" id="financierement_oui">
                                                <label class="form-check-label" for="financierement_oui">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="non" type="radio"
                                                    name="financierement" id="financierement_non">
                                                <label class="form-check-label" for="financierement_non">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profession" class="col-sm-2 col-form-label">Quelle est votre situation
                                        professionnelle actuelle</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="profession"
                                                id="eleveEtudiant">
                                            <label class="form-check-label" for="eleveEtudiant">
                                                Élève / Étudiant
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="profession"
                                                id="formationPro" checked>
                                            <label class="form-check-label" for="formationPro">
                                                Formation professionnelle
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="profession"
                                                id="salarie">
                                            <label class="form-check-label" for="salarie">
                                                Salarié du privé ou du public
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="profession"
                                                id="travailleurIndependant">
                                            <label class="form-check-label" for="travailleurIndependant">
                                                Travailleur indépendant
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="profession"
                                                id="autre">
                                            <label class="form-check-label" for="autre">
                                                Autre: précisez
                                            </label>
                                            <input type="text" name="" id=""
                                                class="form-control mt-2" placeholder="Précisez....">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @elseif ($startEtap == 4)
                        <div class="card">
                            <div class="card-header bg-success fs-4 text-white text-center">Etape {{ $startEtap }}/
                                {{ $endtEtap }}
                                - Situation
                                Financiere/Professionelle
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="form-group row">
                                        <label for="niveau_etude" class="col-sm-2 col-form-label">Quel est votre
                                            niveau
                                            d'étude?</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nationalite">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="diplome" class="col-sm-2 col-form-label">Quelles sont vos
                                            diplomes (y compris qualificatio professionnellle)</label>
                                        <div class="col-sm-10">
                                            <textarea placeholder="NB: N'oubliez pas vos qualification professionnelle" name="diplome" class="form-control"
                                                id="" cols="2" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="experience_pro" class="col-sm-2 col-form-label">Quelles sont vos
                                            expériences professionnelle y compris stage et volontariat</label>
                                        <div class="col-sm-10">
                                            <textarea placeholder="Nb: Si vous n'avez pas d'experience mettez <<Néant>>" name="diplome" class="form-control"
                                                id="" cols="2" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="votre_engagement" class="col-sm-2 col-form-label">Quels sont vos
                                            engagements associatifs</label>
                                        <div class="col-sm-10">
                                            <textarea placeholder="Quels sont vos engagements associatifs (nom de l'association, poste occupé et dates)"
                                                name="votre_engagement" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
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
                                            <textarea placeholder="NB: Si pas de connaissance, mettez Néant" name="connaissance_informatique"
                                                class="form-control" id="" cols="2" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="connaissance_linguistique" class="col-sm-2 col-form-label">Quelles
                                            sont vos connaissances linguistiques</label>
                                        <div class="col-sm-10">
                                            <textarea placeholder="Nb: Precisez si parlé, lu , ecrit" name="connaissance_linguistique" class="form-control"
                                                id="" cols="2" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="projet_professionnelle" class="col-sm-2 col-form-label">Quel est
                                            votre projet professionnel</label>
                                        <div class="col-sm-10">
                                            <textarea name="projet_professionnelle" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="connaissance_programme" class="col-sm-2 col-form-label">Comment
                                            avez-vous eu connaissance du Programme Competences pour Demain et du Labis
                                            ?</label>
                                        <div class="col-sm-10">
                                            <textarea name="connaissance_programme" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="attente_abis" class="col-sm-2 col-form-label">Quelles
                                            sont vos attentes vis a vis du LABIS ?</label>
                                        <div class="col-sm-10">
                                            <textarea name="attente_abis" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="competence_experience" class="col-sm-2 col-form-label">Quelles
                                            sont vos
                                            competences et experiences que vous pouvez partager au sein du LABIS</label>
                                        <div class="col-sm-10">
                                            <textarea name="competence_experience" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
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
                                        <label for="projet_professionnelle" class="col-sm-2 col-form-label">Quel est
                                            votre projet professionnel</label>
                                        <div class="col-sm-10">
                                            <textarea name="projet_professionnelle" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="connaissance_programme" class="col-sm-2 col-form-label">Comment
                                            avez-vous eu connaissance du Programme Competences pour Demain et du Labis
                                            ?</label>
                                        <div class="col-sm-10">
                                            <textarea name="connaissance_programme" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="attente_abis" class="col-sm-2 col-form-label">Quelles
                                            sont vos attentes vis a vis du LABIS ?</label>
                                        <div class="col-sm-10">
                                            <textarea name="attente_abis" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="competence_experience" class="col-sm-2 col-form-label">Quelles
                                            sont vos
                                            competences et experiences que vous pouvez partager au sein du LABIS</label>
                                        <div class="col-sm-10">
                                            <textarea name="competence_experience" class="form-control" id="" cols="2" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dart" wire:click="decrement">Retour</button>
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
