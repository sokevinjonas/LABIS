
<form method="get" action="{{route('filter.presence')}}">

    <div class="row filter-row">

        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label >nom ou prénom</label>
                <input type="text" class="form-control"  name="nom" placeholder="nom">
                {{-- <select class="form-control @error('sexe') is-invalid @enderror" name="sexe" >
                    <option value="">---------</option>
                    @foreach ($users as $user )

                    <option class="" value="{{ $user->id  }}" > {{$user->nom }}</option>

                    @endforeach
                </select> --}}
            </div>
        </div>

        {{-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label >sexe</label>
                <input type="text" class="form-control" name="sexe" placeholder="">

            </div>
        </div> --}}

        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label >Sexe</label>
            <select class="form-control @error('sexe') is-invalid @enderror" name="sexe" >
                <option value="">---------</option>
                <option value="M">Homme</option>
                <option value="F">Femme</option>
            </select>

            </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label >Date</label>
                <input type="date" class="form-control " name="date_du_jour" >

            </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <label >Recherche</label>

                    <button type="submit" class="btn btn-success" name="search" ><i class="fas fa-search"></i></button>

            </div>
        </div>


    </div>

    {{-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group">
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>

        </div>
    </div> --}}
    {{-- <div class="input-group-append">
        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
    </div> --}}

</form>

