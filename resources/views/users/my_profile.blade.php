@extends('layouts.app')
@section('CustomCSS')
    <style>
        .btn-custom {
            background-color: #84ff00;
            color: #000000;
        }
    </style>
@endsection
@section('content')
    {{-- @if (!$user->VerifierSiProfileEstComplet()) --}}
    {{-- <p class="alert alert-danger">Alert Profile imcomplet</p> --}}
    {{-- @endif --}}
    @if (!$notComplet)
        <p class="alert alert-warning">Votre profil est incomplet. Veuillez le compléter en remplissant tous les champs
            vides.</p>
    @endif

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-danger card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ $user->photo ? asset('storage/photo_profile/' . $user->photo) : asset('images/user.png') }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->nom }}</h3>

                    <button class="submit btn btn-default btn-block" data-toggle="modal" data-target="#ChangeUserProfile">
                        {{ $user->photo ? 'Modifier la photo' : 'Ajouter une photo' }}
                    </button>

                    @if (Auth::user()->isUser())
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                @if ($Countpresence == 0)
                                    <b>Aucune presence enregistré</b>
                                @else
                                    <b>Nombres de Presence</b> <a class="float-right">{{ $Countpresence }}</a>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Aucune activité participer</b>
                                {{-- <b>Participation(activité)r</b> <a class="float-right">543</a> --}}
                            </li>
                            <li class="list-group-item">
                                {{-- <b>Friends</b> <a class="float-right">13,287</a> --}}
                            </li>
                        </ul>
                    @endif

                    <a href="{{ route('logoutUser') }}" class="btn btn-danger btn-block"><b>Deconnexion</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Mes Infos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Changer mot de
                                passe</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form class="form-horizontal" method="POST" action="{{ route('post_user_profile') }}">
                                @csrf
                                @method('POST')
                                <div class="form-group row">
                                    <label for="nom" class="col-sm-2 col-form-label">Nom & Prenom(s)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nom" value="{{ $user->nom }}"
                                            class="form-control" id="inputName" placeholder="Votre Nom et Prenom (s)">
                                    </div>
                                    @error('nom')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control" placeholder="Adresse mail">
                                        @error('email')
                                            <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telephone" class="col-sm-2 col-form-label">Numero telephone</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="telephone" value="{{ $user->telephone }}"
                                            class="form-control" id="telephone" placeholder="Numero de Telephone">
                                        @error('telephone')
                                            <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telephone2" class="col-sm-2 col-form-label">Numero telephone
                                        (Whatsapp)</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="whatsapp" value="{{ $user->whatsapp }}"
                                            class="form-control" id="telephone2" placeholder="Numero Whatsapp">
                                        @error('whatsapp')
                                            <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sexe" class="col-sm-2 col-form-label">Sexe</label>
                                    <div class="col-sm-10">
                                        <select name="sexe" id="sexe" class="form-control">
                                            <option value="">-----</option>
                                            <option value="M" @if (old('sexe', $user->sexe) == 'M') selected @endif>
                                                Homme
                                            </option>
                                            <option value="F" @if (old('sexe', $user->sexe) == 'F') selected @endif>
                                                Femme
                                            </option>
                                        </select>
                                        @error('sexe')
                                            <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profession" class="col-sm-2 col-form-label">Profession</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="profession" value="{{ $user->profession }}"
                                            class="form-control" id="profession" placeholder="Profession">
                                        @error('profession')
                                            <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bio" class="col-sm-2 col-form-label">Decrivez-vous? (pas
                                        obligatoire)</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="bio" id="bio" placeholder="Une description de vous">{{ $user->bio }}</textarea>
                                        @error('bio')
                                            <span class="text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Ancien mot de passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="email"
                                            placeholder="Ancien mot de passse">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-2 col-form-label">Nouveau mot de
                                        passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="new_password"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirmé le mot de
                                        passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="confirm_password"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Mettre a jour</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
