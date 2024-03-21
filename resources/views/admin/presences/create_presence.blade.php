
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

<style>
    .kbw-signature {
        width: 500px;
        height: 500px;
    }
</style>
<div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'enregistrement de présence</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

    <form method="POST" action="{{route('presence')}}" class="forms-sample" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Heure d'arrivée</label>
                    {{-- <input type="time" class="form-control @error('mercredi') is-invalid @enderror" name="mercredi" value="old('heure_arriver', $heureActuelle)" required autofocus autocomplete="heure_depart" > --}}
                    <div class="input-group date">
                        <input type="time" name="heure_arriver"
                            class="form-control datetimepicker-input" />
                    </div>
                    @error("heure_arriver")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex-grow-1">
                    <label >Heure de départ </label>
                    <input type="time" required class="form-control @error('heure_depart') is-invalid @enderror" name="heure_depart">

                    @error("heure_depart")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">

                            <label class="col-form-label">Motif</label>

                            <textarea name="motif" required id="maxlength-textarea" class="form-control" maxlength="100" rows="8" placeholder="Le champ de saisi est limité à  100 caractères."></textarea>

                    </div>
                </div>
            </div>




        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Je signe ma presence</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>

            {{-- <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button> --}}
        </div>
    </form>

</div>
  <!-- /.card -->
{{--
</div>
</div> --}}


<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript">
  var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
  $('#clear').click(function (e) {
      e.preventDefault();
      sig.signature('clear');
      $("#signature64").val('');
  });
</script>


