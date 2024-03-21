
@extends('layouts.app')
@section('content')
{{-- @include('admin.presences.filter_presence') --}}



<div class="row ">

    <div class="card">
      <div class="card-header bg-gradient-primary d-flex align-items-center">
        <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des activitées</h3>

        <div class="card-tools d-flex align-items-center ">
            <button type="button" class="btn btn-link text-white mr-4 d-block" data-toggle="modal"
            data-target="#bd-example-modal-lg">
            <i class="fas fa-user-plus"></i> Ajouter activité
        </button>
          <div class="input-group input-group-md" style="width: 250px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
              <div class="row p-4 pt-5">
                  <!-- Le reste du contenu de votre vue -->

                  <!-- Nouvelle section pour afficher les cartes des utilisateurs -->

                      @foreach ($activites as $key => $item )
                          <div class="col-md-4">
                          <div class="card mb-4" data-toggle="modal"   data-target="#detailModal{{ $key }}" >
                          <div class="card-header">
                              {{-- <img src="{{ asset('images/labis1.jpg') }}" class="card-img-top" alt="..."> --}}
                              <img src="{{ asset($item->image) }}" class="card-img-top" alt="Img" />



                          </div>


                          <div class="card-body">


                              <p ><strong>Date début:  <a style="color: red">{{ $item->date_debut }} </a></strong></p>

                              <p><strong> Date fin: <a style="color: red">{{ $item->date_fin }} </a></strong></p>

                              <p><strong> Statut: <a >

                                 @if($item->etat == "active")
                                 <a class="btn btn-success mx-2"> Publié </a>
                                @else
                                <a class="btn btn-danger mx-2">Non Publié </a>
                                @endif
                        </a>

                        </strong>
                        </p>






                                      <!-- Modal de détail correspondant à cette carte -->
                                      <div class="modal fade bd-example-modal-xl"  id="detailModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $key }}" aria-hidden="true">
                                  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="dialog">
                                      <div class="modal-content">
                                          <!-- En-tête du modal -->
                                          <div class="modal-header">

                                              <h4 class="modal-title"><i class="fas fa-user-plus fa-2x"></i>Information sur l'activité  </h4>

                                          </div>
                                          <!-- Corps du modal -->
                                          <div class="modal-body">

                                             @include('activites.info_activite')

                                                              <br>
                                                              <a href="{{route('publier_activite',$item->id)}}" class="btn btn-warning active" role="button" aria-pressed="true"><i class="fas fa-check-circle"></i>
                                                                Publier</a>
                                                              &nbsp;&nbsp;
                                                              <a href="{{route('retirer_activite',$item->id)}}" class="btn btn-primary active" role="button" aria-pressed="true">Retirer</a>
                                                              &nbsp;&nbsp;
                                                               <a href="{{--route('telecharger.pdf', ['id' => $item->id])--}}" class="btn btn-success btn-icon-text" role="button" aria-pressed="true">
                                                                  <i class="far fa-edit"> </i>Modifier

                                                              </a>



                                          </div>

                                          <!-- Pied du modal -->
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                                      <!-- fin Visualisation -->
                          </div>


                          </div>

                          </div>
                  @endforeach


                    <!-- Ajouter les liens de pagination -->
          </div>


      <!-- /.card-body -->
      <div class="card-footer">
          <div class="float-right">
              {{ $activites->links('pagination::bootstrap-4') }}
          </div>
      </div>
    </div>
    <!-- /.card -->

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
                                        @include('activites.create_activite')
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
