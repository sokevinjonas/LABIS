<style>
    .kbw-signature {
        width: 500px;
        height: 500px;
        border: 2px;
    }
</style>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire des détails de la présence</h3>
    </div>
    <div class="card-body">
        <div class="d-flex">
            <div class="form-group flex-grow-1 mr-2">
                <label>Date d'enregistrement</label>
                <input type="text" class="form-control @error('heure_depart') is-invalid @enderror"
                    value="{{ $item->date_du_jour }}" disabled>
                @error('date_du_jour')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="d-flex">
            <div class="form-group flex-grow-1 mr-2">
                <label>Heure d'arrivée</label>
                {{-- <input type="time" class="form-control @error('mercredi') is-invalid @enderror" name="mercredi" value="old('heure_arriver', $heureActuelle)" required autofocus autocomplete="heure_depart" > --}}
                <input type="time" required class="form-control @error('heure_depart') is-invalid @enderror"
                    value="{{ $item->heure_arriver }}" disabled>
                @error('heure_arriver')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group flex-grow-1">
                <label>Heure de départ </label>
                <input type="time" required class="form-control @error('heure_depart') is-invalid @enderror"
                    value="{{ $item->heure_depart }}" disabled>

                @error('heure_depart')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="col-form-label">Motif</label>
                    <textarea name="motif" required id="maxlength-textarea" class="form-control" maxlength="100" rows="2" disabled>{{ $item->motif }}</textarea>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-12">
                <label>Signature:</label>
                <br />
                <div id="sig"></div>
                <br /><br />
                <button id="clear" class="btn btn-danger btn-sm">Clear</button>
                <textarea id="signature" required name="signed" style="display: none" value="{{ $item->signature }}" disabled></textarea>
            </div> --}}
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">fermer</button>
    </div>
</div>
