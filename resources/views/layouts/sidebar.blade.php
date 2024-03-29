<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link ">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Accueil
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('infos.index') }}" class="nav-link ">
                    <i class="nav-icon fas fa-running"></i>
                    <p>
                        Activités et Infos
                    </p>
                </a>
            </li>
            @if (Auth::user()->isAdmin())
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tableau de bord
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a class="nav-link active" data-widget="fullscreen" href="#" role="button">
                                <i class="fas fa-expand-arrows-alt"></i>
                                <p>Vue globale</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>Paramètres</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class=" nav-icon fas fa-user-shield"></i>
                        <p>
                            Utilisateurs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('listeUser') }}" class="nav-link">
                                <i class=" nav-icon fas fa-users-cog"></i>
                                <p> Liste utilisateurs</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class=" nav-icon fas fa-user-shield"></i>
                        <p>
                            Présences
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('listePresenceAdmin') }}" class="nav-link">
                                <i class=" nav-icon fas fa-users-cog"></i>
                                <p> Liste présences</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @elseif (Auth::user()->isUser())
                <li class="nav-item">
                    <a href="{{ route('mespresences') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            Mes Presences
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fiche_renseigement') }}" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Fiche de Renseigement
                        </p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
