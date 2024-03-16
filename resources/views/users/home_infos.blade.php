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
            align-items: flex-start;
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
    @livewire('activite-infos')
@endsection
