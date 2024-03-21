<!DOCTYPE html>
<html lang="en">

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
                </div>
            </div>

            <div class="card-body">
                @if (Session::has('success'))
                    <p class="alert alert-default text-success">{{ Session::get('success') }}</p>
                @endif
                @if (Session::has('error'))
                    <p class="alert alert-default text-danger">{{ Session::get('error') }}</p>
                @endif
                <p class="login-box-msg">Heureux de vous revoir</p>

                <form action="{{ route('Postsign') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="input-group mb-3">
                        <input type="number" name="telephone" class="form-control" placeholder="Numéro de téléphone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mobile"></span>
                            </div>
                        </div>
                    </div>
                    @error('telephone')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe ">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-danger btn-block">Me connecter</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <a href="{{ route('register') }}" class="text-center mb-2">Je ne suis pas un membre</a>
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
