@if (Auth::user()->isUser())
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <iframe width="250" height="210" src="{{ asset('video/LABIS.mp4') }}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class="border-0" allowfullscreen=""></iframe>
                </div>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Marquez
                    sa
                    presence</button>
            </div>
        @else
            <div class="presence">
                <button type="button" disabled class="btn btn-primary">Vous avez deja marquez votre
                    presence</button>
            </div>
        @endif
        <div class="row mt-5">
            <div class="col">
                <div class="callout callout-danger">
                    <h5><i class="fas fa-info"></i> Quel est l'objectif du LABIS:</h5>
                    Son objectif porte sur l’autonomisation des jeunes en répondant aux questions d’employabilité et
                    celles d’un engagement citoyen responsable permettant d’accroître le nombre des jeunes conscients et
                    aptes à répondre aux enjeux de leur territoire.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Marquez votre Presence du jour</h5>
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
                                <label>Heure de Pointe:</label>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Soummettre</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endif
