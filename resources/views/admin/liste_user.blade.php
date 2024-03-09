@extends('layouts.app')
@section('content')
    @include('admin.filter_user')
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-gradient-primary d-flex align-items-center">
                        <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des utilisateurs</h3>

                        <div class="card-tools d-flex align-items-center ">
                            <button type="button" class="btn btn-link text-white mr-4 d-block" data-toggle="modal"
                                data-target="#bd-example-modal-lg">
                                <i class="fas fa-user-plus"></i> Nouveau utilisateur
                            </button>
                            <div class="input-group input-group-md">
                                <form method="get" action="">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control float-right"
                                            placeholder="Search" value="{{ request('search') }}">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                        <table class="table table-head-fixed">
                            <thead>
                                <tr>
                                    <th style="width:10%;">Photo</th>
                                    <th style="width:15%;">Prenom</th>
                                    <th style="width:15%;">Telephone</th>
                                    <th style="width:15%;">Role</th>
                                    <th style="width:15%;" class="text-center">Ajouté</th>
                                    <th style="width:30%;">Action</th>
                                </tr>
                            </thead>
                            @forelse ($users as $key => $item)
                                <tbody>
                                    <tr>
                                        <td>
                                            @if ($item->sexe == 'F')
                                                <img src="{{ asset('images/woman.png') }}" width="24" />
                                            @else
                                                <img src="{{ asset('images/man.png') }}" width="24" />
                                            @endif
                                        </td>
                                        <td>{{ $item->nom }} </td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td class="text-center"><span class="tag tag-success">
                                                @if ($item->created_at)
                                                    {{ $item->created_at->diffForHumans() }}
                                                @else
                                                    Date inconnue
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#editModal{{ $item->id }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <div class="modal fade bd-example-modal-xl" id="editModal{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#{{-- route('admin.membres.delete.membre',$item->id) --}}" class="btn btn-danger" id="delete"><i
                                                    class="far fa-trash-alt"></i></a>
                                            <!-- affiché plus de detail -->
                                            <button type="button" class="btn btn-info "
                                                data-toggle="modal"data-target="#allModal{{ $item->id }}">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                            <div class="modal fade bd-example-modal-xl" id="allModal{{ $item->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    @include('admin.users_infos')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                                <td colspan="5" class="text-center text-warning">
                                    Aucun utilisateur n'a encore ete enregistré
                                </td>
                            @endforelse
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="float-right">
                            {{-- {{ $users->links('pagination::bootstrap-4') }} --}}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">

            <!--  modale -->
            <div class="modal fade bd-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class=" card-body">
                                            @include('admin.users_create')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ol>
    </nav>
@endsection
