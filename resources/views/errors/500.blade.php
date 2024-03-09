<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found</title>
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .error-box {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="main-wrapper">
                        <div class="error-box">
                            <h1 style="color:yellow">500</h1>
                            <h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i> Erreur Interne du Serveur
                            </h3>
                            <p class="h4 font-weight-normal">Vous n'avez pas la permission de visualiser cette
                                ressource.</p>
                            <a href="{{ url('/') }}" class="btn btn-primary">Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>
