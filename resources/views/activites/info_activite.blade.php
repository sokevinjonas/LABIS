<div class="card mb-3">
    <div class="row g-0">
        <div class="col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
            {{-- <img id="affiche" src="{{ asset('images/labis1.jpg') }}" class="img-fluid rounded-start"
                alt="photo formation"> --}}

                <img src="{{ asset($item->image) }}" class="img-fluid rounded-start"
                alt="photo formation" />

        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="card-body">
                <a class="card-title">{{ $item->titre }}</a><br>
                <p class="time"> Debute le {{ $item->date_debut }} </p>

                <div class="infos">
                    <p class="card-contenu">{{ $item->description }}</p>


                    <p class="card-text"><small class="text-muted">Publier il y a
                            {{ $item->created_at->diffForHumans() }}s</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
