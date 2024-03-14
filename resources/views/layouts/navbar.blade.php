<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    {{-- <style>
        h1 {
            border-radius:
        }
    </style> --}}
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"
        style="margin-right: 2%; border-radius: 10px; display: flex; justify-content: center; align-items: center;">
        <li class="nav-item mt-2 pb-3">
            <a class="nav-link" href="{{ route('myProfile') }}">
                <span style="margin-right: 5px; color: #ff0000;">Mon Profile</span>
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nom }}" class="img-circle elevation-2"
                    style="width: 40px; height: 40px; border-radius: 50%;" alt="profile utilisateur">
            </a>
        </li>
    </ul>

</nav>
