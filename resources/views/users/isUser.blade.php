@if (Auth::user()->isUser())
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="callout callout-danger">
                    <h5><i class="fas fa-info"></i> Qu'est ce que le LABIS:</h5>
                    Le Laboratoire d’innovation sociale (LABIS), mis en place à travers un programme de solidarité
                    laïque appelé « compétence pour demain », est un espace interactif d’innovations modernes à vision
                    éducative et sociale. En encourageant la formation par la pratique, il permet de stimuler et de
                    valoriser les initiatives portées par des jeunes. C’est un tiers-lieu d’innovation ouvert à tous.
                    C’est aussi un espace de travail, de mixité, de créativité et de socialisation qui va étudier et
                    proposer des solutions aux problématiques sociétales au bénéfice de la communauté.
                </div>
            </div>
        </div>
        @if ($presenceExistante)
            <div class="presence">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Marquez sa
                    presence</button>
                <a href="{{ route('infos.index') }}" class="btn btn-danger" target="_blank"
                    rel="noopener noreferrer">Activité / Formations</a>
            </div>
        @else
            <div class="presence">
                <button type="button" disabled class="btn btn-primary">Vous avez deja marquez votre
                    presence du jour</button>
                <a href="{{ route('infos.index') }}" class="btn btn-danger" target="_blank"
                    rel="noopener noreferrer">Activité / Formations</a>
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="staticBackdropLabel">Marquez votre présence du jour</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('presence') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Je suis arrivé à:</label>
                                <div class="input-group date">
                                    <input type="time" name="heure_arriver"
                                        class="form-control datetimepicker-input" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Motif ou Activité:</label>
                                <input type="text" name="motif" class="form-control" />
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <i class="fa fa-exclamation-triangle text-warning"></i>
                            <p class="ml-2 mb-0">NB: Lorsque vous faites l'enregistrement, l'heure actuelle est
                                considérée comme votre heure de départ.</p>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-success">Enregistré</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endif
