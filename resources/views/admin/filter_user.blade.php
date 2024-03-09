<form method="get" action="">
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label>Nom & Prenom(s)</label>
                <input type="text" class="form-control" name="nom" placeholder="nom">
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label>Sexe</label>
                <select class="form-control @error('sexe') is-invalid @enderror" name="sexe">
                    <option value="">---------</option>
                    <option value="M">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label>Télephone</label>
                <input type="number" class="form-control " name="telephone" placeholder="71253698">
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label>Recherche</label>
                <button type="submit" class="btn btn-success" name="search"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>
