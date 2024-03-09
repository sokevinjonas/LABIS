<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel utilisateur</h3>
    </div>
    <form method="POST" action="{{ route('createUser') }}" class="forms-sample" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-body">
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Nom & Prenom(s)</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="form-control"
                        name="nom">
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Sexe</label>
                    <select class="form-control" name="sexe" value="{{ old('sexe') }}">
                        <option value="">---------</option>
                        <option value="M">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                    @error('sexe')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1">
                    <label>Adresse e-mail</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Telephone</label>
                    <input type="number" class="form-control" name="telephone" value="{{ old('telephone') }}">
                    @error('telephone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1 mr-2">
                    <label for="exampleInputPassword1">Confirmer Mot de passe</label>
                    <input type="password" class="form-control" name="password_confirmation">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Attribuer un role</label>
                    <select name="role" class="form-control">
                        <option value="user">Jeune labis</option>
                        <option value="admin">Administrateur</option>
                    </select>
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="true">
                        <label for="agreeTerms">
                            j'accepte les <a href="#">regles</a>
                        </label>
                    </div>
                    @error('terms')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.col -->
            </div>
            {{-- </div> --}}
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>
            </div>
    </form>
</div>
