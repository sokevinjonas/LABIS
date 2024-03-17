<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('images/logo_labis.svg') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Labis</title>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo_labis.svg') }}" type="image/x-icon">
    @yield('CustomCSS')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('images/logo_labis.svg') }}" alt="AdminTE Logo" class="brand-image">
                <span class="brand-text font-weight-light">Labis</span>
            </a>

            <!-- Sidebar -->
            @include('layouts.sidebar')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @if (Auth::user()->isAdmin())
                                <h1 class="m-0">Tableau de Board</h1>
                            @endif
                            @if (Auth::user()->isUser())
                                @yield('title')
                            @endif
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ChangeUserProfile" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Mettre à jour votre photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update_user_photo') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="photo" class="form-label">Ma photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            @error('photo')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js?v=3.2.0') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('plugins/code/code.js') }}"></script>
    <script src="{{ asset('plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
    @yield('CustomJS')
</body>

</html>
