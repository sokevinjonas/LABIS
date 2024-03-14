@extends('layouts.app')
@section('CustomCSS')
    <style>
        .card-title {
            font-family: "TypoPRO Roboto",
                sans-serif;
            font-size: 23px;
            letter-spacing: normal;
            color: #333333;
            text-align: start;
            line-height: 25.3px;
        }

        .time {
            margin-top: 10px;
            color: #ed1c24;
            /* line-height: 20px; */
            font-size: 14px;
            text-align: start;
        }

        .card-body {
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            text-align: start;
        }

        .card-contenu {
            margin-top: 15px;
        }

        .infos {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            align-items: flex-start
        }

        #affiche {
            margin-left: 4%;
            width: 300px;
            min-height: 80%;
            min-width: 80%;
        }

        /* Media query pour les écrans de taille moyenne (md) et supérieure */
        @media (min-width: 420px) and (max-width: 575px) {
            #affiche {
                margin-top: 3%;
                margin-right: 2%;
                width: 90%;
                height: 90%;
            }
        }

        @media (min-width: 257px) and (max-width: 419px) {
            #affiche {
                margin-top: 2%;
                margin-right: 1%;
                width: 90%;
                height: 90%;
            }
        }
    </style>
@endsection
@section('content')
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
                    <img id="affiche"
                        src="https://www.solidarite-laique.org/wp-content/uploads/2023/11/xphoto-dossier-engagement-des-jeunes-e1700227665598-255x146.jpg.pagespeed.ic.py2qzKVgyW.jpg"
                        class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="card-body">
                        <a class="card-title">Pour accompagner un.e jeune qui s’engage, il faut toute une équipe !
                        </a>
                        <div class="infos">
                            <span class="time"> 29 janvier 2024 </span>
                            <p class="card-contenu">Collectif ou individuel, le volontariat est un outil d’éducation à la
                                citoyenneté et à la solidarité internationale. Auprès des équipes de notre siège social, de
                                nos bureaux régionaux (Afrique de l’Ouest, bassin méditerranéen, Caraïbes) ou d’associations
                                partenaires, nous proposons aux jeunes des parcours d’engagement, dans leur pays ou à
                                l’international.</p>
                            <p class="card-text"><small class="text-muted">Publier il y a 3 minutes</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
