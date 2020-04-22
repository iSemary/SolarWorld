<nav class="col-md-2 d-none d-md-block sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="pb-3">
{{--     <img src="{{asset('storage/main-content/SolarWorldLOGO.png')}}" class="top-logo-img" alt="">--}}
                <a class="top-logo" href="{{URL::to('/')}}">Solar World</a>
                <p class="top-p">All world stuff here.</p>
            </li>
            <li class="nav-item">
                <a class="nav-link aside-nav active btn badge-primary @if(isset($value) && (ucfirst($value) == "Movies")) light-red @else dark-blue @endif text-left my-1" href="{{URL::to('movies')}}">
                    <span data-feather="home"></span>
                    <i class="fas fa-film" style="color:#3F51B5"></i> Movies


                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link aside-nav active btn badge-primary @if(isset($value) && (ucfirst($value) == "Series")) light-red @else dark-blue @endif text-left my-1" href="{{URL::to('series')}}">
                    <span data-feather="home"></span>
                    <i class="fas fa-video" style="color:#FF9800"></i> Series <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link aside-nav active btn badge-primary @if(isset($value) && (ucfirst($value) == "Games")) light-red @else dark-blue @endif text-left my-1" href="{{URL::to('games')}}">
                    <span data-feather="home"></span>
                    <i class="fas fa-gamepad" style="color:#F44336"></i> Games <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link aside-nav active btn badge-primary @if(isset($value) && (ucfirst($value) == "Programs")) light-red @else dark-blue @endif text-left my-1" href="{{URL::to('programs')}}">
                    <span data-feather="home"></span>
                    <i class="fas fa-shapes" style="color:#9C27B0"></i> Programs <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link aside-nav active btn badge-primary @if(isset($value) && (ucfirst($value) == "Music")) light-red @else dark-blue @endif text-left my-1" href="{{URL::to('music')}}">
                    <span data-feather="home"></span>
                    <i class="fas fa-music" style="color:#4CAF50"></i> Music <span
                            class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link aside-nav active btn badge-primary @if(isset($value) && (ucfirst($value) == "Anime")) light-red @else dark-blue @endif text-left my-1" href="{{URL::to('anime')}}">
                    <span data-feather="home"></span>
                    <i class="fas fa-paw" style="color:#FFEB3B"></i> Anime <span
                            class="sr-only">(current)</span>
                </a>
            </li>
        </ul>

        <ul class="nav flex-column">

            <li class="pb-1">
                <h5 class="sidebar-heading d-flex justify-content-between align-items-center mt-2 mb-3">
                    <span><i class="fas fa-filter"></i> Sort as </span>
                </h5>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-3 text-muted">
                    <span><i class="fas fa-user-astronaut"></i> Select actor </span>
                </h6>
                <select class="form-control aside-select">
                    <option data-tokens="ketchup mustard">NOT</option>
                </select>
            </li>

            <li class="pb-1">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-3 text-muted">
                    <span><i class="fas fa-calendar-alt"></i> Select year </span>
                </h6>
                <div class="row justify-content-around">
                    <select style="    width: 40%;" class="form-control aside-select">
                        <option selected>From</option>
                        <option data-tokens="ketchup mustard">2011</option>
                        <option data-tokens="mustard">2012</option>
                        <option data-tokens="frosting">2013</option>
                    </select>
                    <select style="    width: 40%;" class="form-control aside-select">
                        <option selected>To</option>
                        <option data-tokens="ketchup mustard">2011</option>
                        <option data-tokens="mustard">2012</option>
                        <option data-tokens="frosting">2013</option>
                    </select>
                </div>
            </li>
            <li class="pb-1">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-3 text-muted">
                    <span><i class="fas fa-film"></i> Movie type </span>
                </h6>
                <div class="category-select">
                    <a class="btn dark-blue p-0 w-100">All</a>
                    @if(isset($types))
                        @foreach($categories::all()->where('id',$categoryNum) as $category)
                            @foreach($category->sub_category as $subcategory)
                                <a href="{{URL::to($value.'/cat/'.Str::slug($subcategory->subcategory_name, '-'))}}" class="text-decoration-none btn dark-blue m-1">
                            {{ucfirst($subcategory->subcategory_name)}}
                                </a>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </li>
        </ul>
        <ul class="nav flex-column">
            <li class="pb-1">
                <h6 class="sidebar-heading d-flex justify-content-between drop-content-down align-items-center px-3 mt-1 mb-3 text-muted">
                    <span><i class="fas fa-language"></i> Language <i class="fas fa-angle-down"></i></span>
                </h6>
                <div class="show-me-up select-drop pl-3" id="show-me-up" style="display: none">
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i>
                        Araibc</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i> English</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i>
                        French</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i> Spanish</a>
                </div>
            </li>
            <li class="pb-1">
                <h6 class="sidebar-heading d-flex justify-content-between drop-content-down align-items-center px-3 mt-1 mb-3 text-muted">
                    <span><i class="fas fa-language"></i> Language <i class="fas fa-angle-down"></i></span>
                </h6>
                <div class="show-me-up select-drop pl-3" id="show-me-up" style="display: none">
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i>
                        Araibc</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i> English</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i>
                        French</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i> Spanish</a>
                </div>
            </li>
            <li class="pb-1">
                <h6 class="sidebar-heading d-flex justify-content-between drop-content-down align-items-center px-3 mt-1 mb-3 text-muted">
                    <span><i class="fas fa-language"></i> Language <i class="fas fa-angle-down"></i></span>
                </h6>
                <div class="show-me-up select-drop pl-3" id="show-me-up" style="display: none">
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i>
                        Araibc</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i> English</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i>
                        French</a>
                    <a href="#" class="text-muted text-decoration-none"><i class="fas fa-plus"></i> Spanish</a>
                </div>
            </li>
        </ul>

    </div>
</nav>