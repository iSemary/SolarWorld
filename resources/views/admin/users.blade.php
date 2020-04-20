@extends('layouts.app')
@section('stylesheets')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <style>
        body {
            color: #fff !important;
            background-color: #20244e !important;
        }

        table {
            background-color: #f8f9fa !important;
            color: #20244e !important;
        }
    </style>
@endsection
@section('content')
    <nav class="navbar admin-nav navbar-expand-lg navbar-light bg-light" style="box-shadow: 0px 0px 14px #f8f9faa6;">
        <a class="navbar-brand" href="/">Solar World</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard <span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.upload')}}">Upload</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('admin.users_show')}}">Administrators</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column my-3">
                        <li class="pb-1">
                            <h6><i class="fas fa-folder-open"></i> Manage Content</h6>
                        </li>
                        <li class="nav-item border-me-left">
                            <a class="nav-link active btn badge-primary dark-blue text-left my-1"
                               href="{{route('admin.upload')}}">
                                <span data-feather="home"></span>
                                <i class="fas fa-upload"></i> Upload File <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="pb-1 border-me-left">
                            <a class="nav-link active btn badge-primary dark-blue text-left my-1"
                               href="{{route('admin.create_category')}}">
                                <span data-feather="home"></span>
                                <i class="fas fa-tags"></i> Create Category <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="pb-1 border-me-left">
                            <a class="nav-link active btn badge-primary dark-blue text-left my-1"
                               href="{{route('admin.create_sub_category')}}">
                                <span data-feather="home"></span>
                                <i class="fas fa-tag"></i> Create Sub Category <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav flex-column mb-3">
                        <li class="pb-1">
                            <h6><i class="fas fa-calculator"></i> Counter</h6>
                        </li>
                        <li class="pb-1 border-me-left">
                            <div class="text-white-blur aside-info-dashboard">
                                <i class="fas fa-users"></i> Users: {{$users::count()}}<br>
                                <i class="far fa-folder-open"></i> Files: {{$files::count()}}<br>
                                <i class="fas fa-tags"></i> Categories: {{$category::count()}}<br>
                                <i class="fas fa-tags"></i> Sub-Categories: {{$sub_category::count()}}<br>
                            </div>
                        </li>
                    </ul>

                    <ul class="nav flex-column mb-3">
                        <li class="pb-1">
                            <h6><i class="fas fa-calculator"></i> Files Counter</h6>
                        </li>
                        <li class="pb-1 border-me-left">

                            <div class="text-white-blur aside-info-dashboard">
                                <i class="fas fa-film"></i> Movies: {{$movies::count()}}<br>
                                <i class="fas fa-video"></i> Series: {{$series::count()}}<br>
                                <i class="fas fa-paw"></i> Anime: {{$anime::count()}}<br>
                                <i class="fas fa-music"></i> Music: {{$musics::count()}}<br>
                                <i class="fas fa-shapes"></i> Programs: {{$programs::count()}}<br>
                                <i class="fas fa-gamepad"></i> Game: {{$games::count()}}<br>
                                <i class="fas fa-bars"></i> Others: {{$others::count()}}<br>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div id="users_manage">
                    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3">
                        <h6><i class="fas fa-users-cog"></i> Administrators / Moderators</h6>
                        <form method="POST" id="admin_mods_control"  style="width: 100%">
                            @csrf
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-1" style="width: 58px;"><i class="far fa-id-badge"></i> ID
                                    </th>
                                    <th scope="col"><i class="fas fa-at"></i> Username</th>
                                    <th scope="col"><i class="far fa-user"></i> Full Name</th>
                                    <th scope="col"><i class="far fa-user"></i> Email</th>
                                    <th  scope="col"><i class="fas fa-cog"></i> Role</th>
                                    <th  scope="col"><i class="far fa-edit"></i> Action</th>
                                </tr>
                                </thead>
                                <tbody id="mods_tbody">
                                @forelse($users::all() as $user)
                                    @foreach($user->role as $role)
                                        @if($role->name == 'Administrator' || $role->name == 'Moderator')
                                            @if($role->name == 'Administrator')
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td><i class="fas fa-at"></i>{{Str::slug($user->user_name, '_')}}</td>
                                                    <td>{{$user->full_name}}</td>
                                                    @if(auth::user()->role->first()->name == "Administrator")
                                                        <td>{{$user->email}}</td>
                                                    @else
                                                        <b>Permission Denied</b>
                                                    @endif
                                                    <td>{{$role->name}}</td>
                                                    <td>
                                                        @if(auth::user()->role->first()->name == "Administrator")
                                                            <a class="pl-1 btn btn-primary" style="padding: 0 5px;"
                                                               href="{{URL::to('user/'.Str::slug($user->user_name, '_'))}}">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            {{--       When press in this \/                      --}}
                                                            <a class="pl-1 btn btn-success" id="edit_user_tr"
                                                               style="padding: 0 5px;" href="#">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            {{--      Hide This /\ and show this \/               --}}
                                                            <button class="pl-1 btn btn-success"
                                                                    style="padding: 0 5px;display: none;"
                                                                    id="save_edit_action"
                                                                    name="users_action" value="edit">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            <input type="hidden" name="userID" id="userID_action"
                                                                   value="{{$user->id}}">
                                                        @else
                                                            <b>Permission Denied</b>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td id="username_action"><i class="fas fa-at"></i>{{Str::slug($user->user_name, '_')}}</td>
                                                    <td id="fullname_action">{{$user->full_name}}</td>
                                                    <td id="email_action">{{$user->email}}</td>
                                                    <td id="role_action">{{$role->name}}</td>
                                                    <td>
                                                        <a class="pl-1 btn btn-primary" style="padding: 0 5px;"
                                                           href="{{URL::to('user/'.Str::slug($user->user_name, '_'))}}">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                        {{--       When press in this \/                      --}}
                                                        <a class="pl-1 btn btn-success" id="edit_user_tr"
                                                           style="padding: 0 5px;" href="#">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        {{--      Hide This /\ and show this \/               --}}
                                                        <button class="pl-1 btn btn-success"
                                                                style="padding: 0 5px;display: none;"
                                                                id="save_edit_action"
                                                                name="users_action" value="edit">
                                                            <i class="fas fa-check"></i>
                                                        </button>


                                                        <button class="pl-1 btn btn-danger" style="padding: 0 5px;"
                                                                name="users_action" value="delete">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                        <button class="pl-1 btn btn-warning" style="padding: 0 5px;"
                                                                name="users_action" value="unpromote">
                                                            <i class="fas fa-unlock" style="color: #fff;"></i>
                                                        </button>
                                                        <input type="hidden" name="userID" id="userID_action"
                                                               value="{{$user->id}}">
                                                    </td>
                                                </tr>
                                            @endif

                                        @endif
                                    @endforeach
                                @empty
                                    No Admins
                                @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                    {{--     Users Table               --}}
                    <div class="d-flex justify-content-between flex-wrap align-items-center mt-2">
                        <h6><i class="fas fa-users"></i> Subscribers</h6>
                        <form method="POST" id="admin_users_control" style="width:100%">
                            @csrf
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-1" style="width: 58px;"><i class="far fa-id-badge"></i> ID
                                    </th>
                                    <th scope="col"><i class="fas fa-at"></i> Username</th>
                                    <th scope="col"><i class="far fa-user"></i> Full Name</th>
                                    <th scope="col"><i class="far fa-envelope"></i> Email</th>
                                    <th scope="col"><i class="far fa-edit"></i> Action</th>
                                </tr>
                                </thead>
                                <tbody id="user_tbody">
                                @forelse($users::paginate(15) as $user)
                                    @foreach($user->role as $role)
                                        @if($role->name == 'Subscriber')
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td id="username_action"><i class="fas fa-at"></i>{{Str::slug($user->user_name, '_')}}</td>
                                                <td id="fullname_action">{{$user->full_name}}</td>
                                                <td id="email_action">{{$user->email}}</td>
                                                <td>
                                                    <a class="pl-1 btn btn-primary" style="padding: 0 5px;"
                                                       href="{{URL::to('user/'.Str::slug($user->user_name, '_'))}}">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    {{--       When press in this \/                      --}}
                                                    <a class="pl-1 btn btn-success" id="edit_user_tr"
                                                       style="padding: 0 5px;" href="#">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    {{--      Hide This /\ and show this \/               --}}
                                                    <button class="pl-1 btn btn-success"
                                                            style="padding: 0 5px;display: none;" id="save_edit_action"
                                                            name="users_action" value="edit">
                                                        <i class="fas fa-check"></i>
                                                    </button>


                                                    <button class="pl-1 btn btn-danger" style="padding: 0 5px;"
                                                            name="users_action" value="delete">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                    <button class="pl-1 btn btn-warning" style="padding: 0 5px;"
                                                            name="users_action" value="promote">
                                                        <i class="fas fa-lock" style="color: #fff;"></i>
                                                    </button>
                                                    <input type="hidden" name="userID" id="userID_action"
                                                           value="{{$user->id}}">
                                                </td>
                                            </tr>
                                        @else
                                            <tr style="color: #FFF;
    background-color: #F44336;">
                                                <td>{{$user->id}}</td>
                                                <td id="username_action"><i class="fas fa-at"></i>
                                                    {{
                                                    Str::slug($user->user_name, '_')
                                                    }}
                                                </td>
                                                <td id="fullname_action">{{$user->full_name}}</td>
                                                <td id="email_action">
                                                    {{ \App\Http\Controllers\FunctionsController::email_stars($user->email)}}

                                                </td>
                                                <td><b>Permission Denied</b></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @empty
                                    No Admins
                                @endforelse
                                </tbody>
                            </table>
                        </form>
                        <div class="mx-auto mt-2">
                            {{ $users::paginate(10)->links()}}
                        </div>

                        <div id="result"></div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
@section('scripts')
    {{--       Action Buttons Control      --}}
    <script>
        $(document).ready(function () {
            $(document).on('click', '#edit_user_tr', function (e) {
                e.preventDefault();

                $(this).hide();
                $(this).next("#save_edit_action").show();

                let User_EMAIL = $(this).parent('td').prevAll('#email_action').text();
                let User_USERNAME = $(this).parent('td').prevAll('#username_action').text();
                let User_FULLNAME = $(this).parent('td').prevAll('#fullname_action').text();

                $(this).parent('td').prevAll('#email_action').text('').append("<input type='text' class='form-control' style='width: 190px;' id='user_email' name='user_email' value='" + User_EMAIL + "'/>");
                $(this).parent('td').prevAll('#username_action').text('').append("<input type='text' class='form-control' style='width: 190px;' id='user_name' name='user_name' value='" + User_USERNAME + "'/>");
                $(this).parent('td').prevAll('#fullname_action').text('').append("<input type='text' class='form-control' style='width: 190px;' id='full_name' name='full_name' value='" + User_FULLNAME + "'/>");

            });
        });
    </script>
    {{--  Admin Mods Control --}}
    <script>
        $(document).ready(function () {
            $('#admin_mods_control button').on('click', function (event) {
                event.preventDefault();
                let action = $(this).val();
                let userID_action = $(this).parent('td').find('#userID_action').val();
                let username = $(this).parent('td').prevAll('#username_action').text();
                //Data From Edit Input
                let user_name = $(this).parent('td').prevAll().find('#user_name').val();
                let full_name = $(this).parent('td').prevAll().find('#full_name').val();
                let user_email = $(this).parent('td').prevAll().find('#user_email').val();

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You will " + action + ' this user : ' + username,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            context: this,
                            url: (action == "edit") ? '{{route("admin.mods_edit")}}' :
                                (action == "delete") ? '{{route("admin.mods_delete")}}' :
                                    (action == "unpromote") ? '{{route("admin.mods_unpromote")}}' : '',
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                action: action,
                                UserID: userID_action,
                                user_name: user_name,
                                full_name: full_name,
                                user_email: user_email,
                            },
                            data: {
                                action: action, UserID: userID_action,
                                user_name: user_name,
                                full_name: full_name,
                                user_email: user_email,
                            },
                            dataType: "json",
                            beforeSend: function (wait) {

                                swal.fire({
                                    title: "Please wait, Your action is being processing...",
                                    imageUrl: '{{asset('storage/main-content/Slow-Loading.gif')}}',
                                    imageWidth: 200,
                                    imageHeight: 200,
                                    imageAlt: 'Loading...',
                                    showConfirmButton: false,
                                });
                            },
                            success: function (response) {
                                if (!response) {
                                    Swal.fire({
                                        title: 'Done!',
                                        text: 'Username: ' + username + 'have been ' + action + 'd',
                                        icon: 'success',
                                        toast: true
                                    });
                                    if (action == "edit") {
                                        $(this).parent('td').prevAll('#email_action').html(user_email);
                                        $(this).parent('td').prevAll('#username_action').html(user_name);
                                        $(this).parent('td').prevAll('#fullname_action').html(full_name);

                                        $(this).hide();
                                        $(this).prev("#edit_user_tr").show();

                                    } else if(action == "delete") {
                                        $(this).parent('td').parent('tr').fadeOut();
                                    }else if(action == "unpromote") {
                                        $(this).parent('td').prevAll('#role_action').remove();
                                        $('#user_tbody').prepend($(this).parent('td').parent('tr'));
                                    }
                                } else {
                                    swal.fire('Oops! Something is wrong !', response, 'error');
                                }
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: 'Cancelled',
                            text: 'Nothing changed.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1100
                        });
                    }
                });
            });
        });
    </script>
    {{--  Admin Users Control --}}
    <script>
        $(document).ready(function () {
            $('#admin_users_control button').on('click', function (event) {
                event.preventDefault();
                let action = $(this).val();
                let userID_action = $(this).parent('td').find('#userID_action').val();
                let username = $(this).parent('td').prevAll('#username_action').text();
                //Data From Edit Input
                let user_name = $(this).parent('td').prevAll().find('#user_name').val();
                let full_name = $(this).parent('td').prevAll().find('#full_name').val();
                let user_email = $(this).parent('td').prevAll().find('#user_email').val();

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You will " + action + ' this user : ' + username,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            context: this,
                            url: (action == "edit") ? '{{route("admin.users_edit")}}' :
                                 (action == "delete") ? '{{route("admin.users_delete")}}' :
                                 (action == "promote") ? '{{route("admin.users_promote")}}' : '',
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                action: action,
                                UserID: userID_action,
                                user_name: user_name,
                                full_name: full_name,
                                user_email: user_email,
                            },
                            data: {
                                action: action, UserID: userID_action,
                                user_name: user_name,
                                full_name: full_name,
                                user_email: user_email,
                            },
                            dataType: "json",
                            beforeSend: function (wait) {

                                swal.fire({
                                    title: "Please wait, Your action is being processing...",
                                    imageUrl: '{{asset('storage/main-content/Slow-Loading.gif')}}',
                                    imageWidth: 200,
                                    imageHeight: 200,
                                    imageAlt: 'Loading...',
                                    showConfirmButton: false,
                                });
                            },
                            success: function (response) {
                                if (!response) {
                                    Swal.fire({
                                        title: 'Done!',
                                        text: 'Username: ' + username + 'have been ' + action + 'd',
                                        icon: 'success',
                                        toast: true
                                    });
                                    if (action == "edit") {
                                        $(this).parent('td').prevAll('#email_action').html(user_email);
                                        $(this).parent('td').prevAll('#username_action').html(user_name);
                                        $(this).parent('td').prevAll('#fullname_action').html(full_name);

                                        $(this).hide();
                                        $(this).prev("#edit_user_tr").show();

                                    } else if(action == "delete") {
                                        $(this).parent('td').parent('tr').fadeOut();
                                    }else if(action == "promote") {
                                        $('#mods_tbody').append($(this).parent('td').parent('tr'));
                                    }
                                } else {
                                    swal.fire('Oops! Something is wrong !', response, 'error');
                                }
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: 'Cancelled',
                            text: 'Nothing changed.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1100
                        });
                    }
                });
            });
        });
    </script>
@endsection