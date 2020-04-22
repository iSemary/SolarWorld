@extends('layouts.app')
@section('stylesheets')
    <style>
        body {
            color: #20244e !important;
            background-color:#FFF !important;
        }
    </style>
@endsection
@section('content')
    @include('admin.admin-layouts.header')

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column my-3">
                        <li class="pb-1">
                            <h6><i class="fas fa-folder-open"></i> Manage Content</h6>
                        </li>
                        <li class="nav-item border-me-left">
                            <a class="nav-link active btn badge-primary dark-blue text-left my-1" href="{{route('admin.upload')}}">
                                <span data-feather="home"></span>
                                <i class="fas fa-upload"></i> Upload File <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="pb-1 border-me-left">
                            <a class="nav-link active btn badge-primary dark-blue text-left my-1" href="{{route('admin.create_category')}}">
                                <span data-feather="home"></span>
                                <i class="fas fa-tags"></i> Create Category <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="pb-1 border-me-left">
                            <a class="nav-link active btn badge-primary dark-blue text-left my-1" href="{{route('admin.create_sub_category')}}">
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
