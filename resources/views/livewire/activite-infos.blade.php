<div>
    <div class="mb-3">
        <div class="row">
            <!-- Première colonne pour le champ de recherche par mots-clés -->
            <div class="col-md-5 mt-3">
                <input class="form-control me-2" type="search" placeholder="Rechercher par mots-clés" aria-label="Search">

            </div>
            <!-- Deuxième colonne pour le champ de tri par date -->
            <div class="col-md-5 mt-3">
                <select name="" id="" class="form-control me-2">
                    <option value="">Trier par date décroissante</option>
                    <option value="">Trier par date croissante</option>
                </select>
            </div>
            <div class="col-md-2 mt-3">
                <button class="btn btn-outline-primary" type="submit">Rechercher</button>
            </div>
        </div>
    </div>

    @foreach ([1, 1, 1, 1, 1] as $d)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
                    <img id="affiche" src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="card-body">
                        <a class="card-title">Pour accompagner un.e jeune qui s’engage, il faut toute une équipe !
                        </a>
                        <div class="infos">
                            <span class="time"> 29 janvier 2024 </span>
                            <p class="card-contenu">Collectif ou individuel, le volontariat est un outil d’éducation à
                                la
                                citoyenneté et à la solidarité internationale. Auprès des équipes de notre siège social,
                                de
                                nos bureaux régionaux (Afrique de l’Ouest, bassin méditerranéen, Caraïbes) ou
                                d’associations
                                partenaires, nous proposons aux jeunes des parcours d’engagement, dans leur pays ou à
                                l’international.</p>
                            <a href="" class="btn btn-success text-end">Je souhaite participer</a>
                            <p class="card-text"><small class="text-muted">Publier il y a 3 minutes</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
