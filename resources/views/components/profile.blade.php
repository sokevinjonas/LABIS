<aside  class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="bg-dark">
        <div class="card-body bg-dark box-profile">
        <div class="text-center">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>

        <h3 class="profile-username text-center ellipsis">{{ userFullName() }} </h3>

        <p class="text-muted text-center">{{getRolesName()}}</p>

        <ul class="list-group bg-dark mb-3">
            <li class="list-group-item">
            <a href="{{route('changePassword')}}" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b >Mot de passe</b> </a>
            </li>
            <li class="list-group-item">
            <a href="{{route('myProfile')}}" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b >Mon profile</b> </a>
            </li>
        </ul>

        <a href="{{ route('logoutUser') }}" class="btn btn-primary btn-block"><b>Déconnexion</b></a>


        </div>
        <!-- /.card-body -->
    </div>
    </aside>
