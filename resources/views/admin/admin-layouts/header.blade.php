<nav class="navbar admin-nav navbar-expand-lg navbar-light bg-light" style="box-shadow: 0px 0px 14px #f8f9faa6;">
    <a class="navbar-brand" href="/">Solar World</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.upload')}}">Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{route('admin.users_show')}}">Administrators</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{route('admin.explorer')}}">File Explorer</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>