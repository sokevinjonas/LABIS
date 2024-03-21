@extends('layouts.app')
@section('content')
    <div class="row">


        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
               <h2>Formulaire de changement de son mot de passe</h2>
                <div class="card-body">
                    <div class="tab-content">


                        <div >
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Ancien mot de passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="email"
                                            placeholder="Ancien mot de passse">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-2 col-form-label">Nouveau mot de passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="new_password"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirmé le mot de
                                        passe</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="confirm_password"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Mettre a jour</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>

                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
