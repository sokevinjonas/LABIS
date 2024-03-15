@extends('layouts.app')
@section('title')
    <h1 class="m-0">Bienvenu au Labis</h1>
@endsection
@section('CustomCSS')
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
    {{--  --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        .presence {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            /* Marge supérieure pour espacement du haut */
            margin-bottom: 20px;
            /* Marge inférieure pour espacement du bas */
        }

        button,
        a {
            width: 100%;
            /* Occupera toute la largeur du conteneur */
            margin-bottom: 10px;
            /* Espacement entre les boutons */
        }
    </style>
@endsection
@section('content')
    @if (Auth::user()->isAdmin())
        @include('users.isAdmin');
    @endif
    @include('users.isUser')
@endsection
@section('CustomJS')
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
@endsection
