@extends('layouts.app')
@section('title')
    <h1 class="m-0">Liste de mes presences</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Nombre de Presence cummulé: {{ $nbr_H }}</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Nombre d'heures</th>
                                <th>Motif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($presence as $data)
                                <tr>
                                    <td>{{ $data->date_du_jour->format('d/m/y') }}</td>
                                    <td>{{ $data->duree }} heure</td>
                                    <td>{{ $data->motif }}</td>
                                </tr>
                            @empty
                                <td colspan="4">Aucune presence enregistré</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
