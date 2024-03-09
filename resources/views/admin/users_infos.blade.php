<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire des info du nouvel utilisateur</h3>
    </div>
    <form method="POST" class="forms-sample" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="card-body">
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Nom & Premom(s)</label>
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                        name="nom" value="{{ $item->nom }}" disabled>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Sexe</label>
                    <select class="form-control @error('sexe') is-invalid @enderror" name="sexe" disabled>
                        <option value="M" @if (old('sexe', $item->sexe) == 'M') selected @endif>Homme</option>
                        <option value="F" @if (old('sexe', $item->sexe) == 'F') selected @endif>Femme</option>
                    </select>
                </div>
                <div class="form-group flex-grow-1">
                    <label>Adresse e-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        disabled value="{{ $item->email }}">
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label>Telephone</label>
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                        value="{{ $item->telephone }}" disabled>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>
        </div>
    </form>
</div>
