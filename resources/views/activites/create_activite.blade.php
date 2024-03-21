<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout d'une activité</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

<form method="POST" action="{{route('store_activite')}}" class="forms-sample" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group flex-grow-1">
                <label >Titre de l'activité </label>
                <input type="text" required class="form-control @error('titre') is-invalid @enderror" name="titre">

                @error("titre")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        <div class="d-flex">
            <div class="form-group flex-grow-1 mr-2">
                <label >Date début</label>
                {{-- <input type="time" class="form-control @error('mercredi') is-invalid @enderror" name="mercredi" value="old('heure_arriver', $heureActuelle)" required autofocus autocomplete="heure_depart" > --}}
                <div class="input-group date">
                    <input type="date" name="date_debut"
                        class="form-control datetimepicker-input" />
                </div>
                @error("date_debut")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group flex-grow-1">
                <label >Date fin </label>
                <input type="date" required class="form-control @error('date_fin') is-invalid @enderror" name="date_fin">

                @error("date_fin")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">

                        <label class="col-form-label">Description de l'activité</label>

                        <textarea name="description" required id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="Le champ de saisi est limité à  100 caractères."></textarea>

                </div>
            </div>
        </div>
        <div class="form-group flex-grow-1">
            <label >Image(optionnelle) </label>
            <input type="file" required class="form-control @error('image') is-invalid @enderror" name="image">

            @error("image")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>





    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-success">Enregistrer</button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>

        {{-- <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button> --}}
    </div>
</form>

</div>
