<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire d'inscription au LABIS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<style>
    .register-page{
        background-color: gray;

        background-image: url('images/labis.jpg');
        background-size: cover; /* Pour redimensionner l'image pour couvrir l'élément */
        background-repeat: no-repeat; /* Pour éviter la répétition de l'image */
    }
</style>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <div>
                    <a href="#" class="h1"><b>LAB</b>IS</a>
                </div>
                <div>
                    <img src="images/labis.jpeg" class="brand-image img-circle " alt="labis logo">
                </div>            </div>
            <div class="card-body">
                <p class="login-box-msg">Je m'inscris en tant que nouveau membre</p>

                <form action="{{ route('Postregister') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="input-group mb-3">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Nom et Prenom (s)">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Votre email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="number" name="telephone" value="{{ old('telephone') }}" class="form-control"
                            placeholder="Numero de telephone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        @error('telephone')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe ">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="confirm_password" class="form-control"
                            placeholder="Repeter le Mot de passe ">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('confirm_password')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="true">
                                <label for="agreeTerms">
                                    j'accepte les <a href="#">règles</a>
                                </label>
                            </div>
                            @error('terms')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-danger btn-block">S'inscrire</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <a href="{{ route('sign') }}" class="text-center mb-2">Je suis déja un membre</a>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
