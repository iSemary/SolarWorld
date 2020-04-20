@extends('layouts.app')
@section('stylesheets')
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
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard <span
                                class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('admin.upload')}}">Upload</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="">Administrators</a>
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
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto my-3">
                @if(isset($sub_categories))
                    <a class="nav-link active btn badge-primary dark-blue text-left my-1 float-right"
                       style="width: fit-content;" href="{{route('admin.create_category')}}">
                        <span data-feather="home"></span>
                        <i class="fas fa-tag"></i> Create Category <span class="sr-only">(current)</span>
                    </a>
                @else
                    <a class="nav-link active btn badge-primary dark-blue text-left my-1 float-right"
                       style="width: fit-content;" href="{{route('admin.create_sub_category')}}">
                        <span data-feather="home"></span>
                        <i class="fas fa-tag"></i> Create Sub Category <span class="sr-only">(current)</span>
                    </a>
                @endif


                <form action="" method="POST" id="category-create" @if(isset($sub_categories))data-cat="sub" @endif >
                    @csrf
                    @if(isset($sub_categories))
                        <div class="form-group">
                            <label for="">Select a Category</label>
                            <select class="form-control" id="" name="category_id">
                                <option value="">Select Category</option>
                                @foreach($categories::all() as $category)
                                    <option value="{{$category->id}}">{{ucfirst($category->category_name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sub Category Name</label>
                            <input type="text" class="form-control" name="subcategory_name"
                                   placeholder="Type Sub-Category...">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" name="category_name" placeholder="Type Category...">
                        </div>
                    @endif
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">
                            @if(isset($sub_categories))<i class="fas fa-tag"></i>@else <i
                                    class="fas fa-tags"></i> @endif
                            @if(isset($sub_categories)) Create Sub Category @else Create Category @endif
                        </button>
                    </div>
                </form>
            </div>
            <div id="categoriesMap" class=" w-100">
                <div class="card mt-2" style="color:#080e33">
                    <div class="card-header">
                        Categories Map
                        <span class="badge badge-success float-right mx-2" style="background-color: #171f54;">
                            Category
                            <span class="badge badge-light">
                                {{$categories::count()}}
                            </span>
                        </span>
                        <span class="badge badge-primary float-right">
                            Sub-Category
                            <span class="badge badge-light">
                                @if(isset($sub_categories))
                                {{$sub_categories::count()}}
                                    @else
                                    {{$sub_category::count()}}
                                @endif
                            </span>
                        </span>
                    </div>
                    <div class="card-body font-weight-bold">
                        @foreach($categories::all() as $category)
                            <div class="category-content">
                            <span class="category-name">
                            {{ucfirst($category->category_name)}}
                            </span>
                                <i class="fas fa-long-arrow-alt-right"></i>

                                <span class="sub-categories-name">

                                @foreach($category->sub_category as $subcategory)
                                        @if (!$loop->last)
                                            {{ucfirst($subcategory->subcategory_name)}}
                                            <i class="fas fa-plus" style="font-size: 12px;"></i>
                                        @else
                                            {{ucfirst($subcategory->subcategory_name)}}
                                        @endif
                                    @endforeach

                            </span>


                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            $('#category-create').on('submit', function (event) {
                event.preventDefault();

                let FormCat = $(this).attr("data-cat");

                if (FormCat == "sub") {
                    formUrl = '{{route("admin.store_sub_category")}}';
                } else {
                    formUrl = '{{route("admin.store_category")}}';
                }
                $.ajax({
                    url: formUrl,

                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function (wait) {
                        swal.fire({
                            text: 'Please wait, Your create is being processing...',
                            imageUrl: '{{asset('storage/main-content/Slow-Loading.gif')}}',
                            imageWidth: 200,
                            imageHeight: 200,
                            imageAlt: 'Custom image',
                            showConfirmButton:false,
                        })
                    },
                    success: function (response) {
                        if (!response) {
                            swal.fire('Cheer !', 'Category Created Successfully.', 'success');
                            $("#categoriesMap").load(location.href + " #categoriesMap");
                        } else {
                            swal.fire('Oops! Something is wrong !', response, 'error');
                        }
                    }
                });
            });
        });

    </script>

@endsection