<div class="card mb-3">
    <div class="row g-0">
        <div class="col-lg-4 col-md-4 col-sm-4 d-flex align-items-center">
            <img id="affiche" src="{{ asset('images/labis1.jpg') }}" class="img-fluid rounded-start"
                alt="photo formation">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="card-body">
                <a class="card-title">{{ $data->titre }}</a>
                <div class="infos">
                    <span class="time"> Debute le {{ $data->date_debut }} </span>
                    <p class="card-contenu">{{ $data->description }}</p>

                    @if ($utilisateurAdejaParticipe)
                        <button class="btn btn-primary" type="button" disabled>
                            Vous êtes déjà inscrit a cette activitée
                        </button>
                    @else
                        <form wire:submit.prevent="participate({{ $data->id }})">
                            <button class="btn btn-primary" type="submit">
                                Je souhaite participer
                            </button>
                        </form>
                    @endif

                    <p class="card-text"><small class="text-muted">Publier il y a
                            {{ $data->created_at->diffForHumans() }}s</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
