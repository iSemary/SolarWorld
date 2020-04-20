@if(isset($value))
    @if(strtolower($value)== "movies")
        <div class="latest-type">
            <span class="type-title">{{"Latest ".ucfirst($value) . " on SolarWorld"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::orderBy('created_at','DESC')->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/movie/'.$file->file_name.'/'.$type->movie_thumbnail)}}"
                                     alt="">
                                <h6>{{$file->file_name}}</h6>
                                <span class="type-quality">{{$type->movie_quality}}</span>
                                <span class="type-year">({{$type->movie_year}})</span>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="category-type mt-2">
            <a href="{{URL::to($value.'/latest')}}" class="text-decoration-none ">
                    <span class="category-type-content light-red" style="display: unset;">
                    <i class="fab fa-hotjar"></i> New {{ucfirst($value)}}
                    </span>
            </a>
            <a href="{{URL::to($value.'/top-rated')}}" class="text-decoration-none ">
                    <span class="category-type-content dark-purple" style="display: unset;">
                    <i class="fas fa-chart-line"></i> Top Rated {{ucfirst($value)}}
                    </span>
            </a>
            @foreach($categories::all()->where('id',$categoryNum) as $category)
                @foreach($category->sub_category as $subcategory)
                    <a href="{{URL::to($value.'/cat/'.Str::slug($subcategory->subcategory_name, '-'))}}"
                       class="text-decoration-none">
                    <span class="category-type-content">
                        {{ucfirst($subcategory->subcategory_name)}}
                    </span>
                    </a>
                @endforeach
            @endforeach
        </div>
        <div class="mt-2">
            <div class="latest-type">
                <span class="type-title">Most Popular {{ucfirst($value) . " on SolarWorld"}}</span>
                <div class="latest-type-content random-type" id="randomType">
                    @foreach($types::inRandomOrder()->paginate(10) as $type)
                        @foreach($type->file as $file)
                            <div class="type-info">
                                <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/movie/'.$file->file_name.'/'.$type->movie_thumbnail)}}"
                                         alt="">
                                    <h6>{{$file->file_name}}</h6>
                                    <span class="type-quality">{{$type->movie_quality}}</span>
                                    <span class="type-year">({{$type->movie_year}})</span>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="type-other-things mt-3">
            <span class="type-title">Take a look at those</span>
            <div class="row">
                @foreach($types::inRandomOrder()->paginate(30) as $type)
                    @foreach($type->file as $file)
                        <div class="type-other-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/movie/'.$file->file_name.'/'.$type->movie_thumbnail)}}"
                                     id="OtherTypeImg" alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{$file->file_name}}</span>
                                    <span class="type-other-quality">{{$type->movie_quality}}</span>
                                    <span class="type-other-year">({{$type->movie_year}})</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

    @elseif(strtolower($value)=='series')
        <div class="latest-type">
            <span class="type-title">{{"Latest ".ucfirst($value) . " on SolarWorld"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::orderBy('created_at','DESC')->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/series/'.$file->file_name.'/'.$type->series_thumbnail)}}"
                                     alt="">
                                <h6>{{$file->file_name}}</h6>
                                <span class="type-quality">{{$type->series_quality}}</span>
                                <span class="type-year">({{$type->series_year}})</span>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="category-type mt-2">
            <a href="{{URL::to($value.'/latest')}}" class="text-decoration-none ">
                    <span class="category-type-content light-red" style="display: unset;">
                    <i class="fab fa-hotjar"></i> New {{ucfirst($value)}}
                    </span>
            </a>
            <a href="{{URL::to($value.'/top-rated')}}" class="text-decoration-none ">
                    <span class="category-type-content dark-purple" style="display: unset;">
                    <i class="fas fa-chart-line"></i> Top Rated {{ucfirst($value)}}
                    </span>
            </a>
            @foreach($categories::all()->where('id',$categoryNum) as $category)
                @foreach($category->sub_category as $subcategory)
                    <a href="{{URL::to($value.'/cat/'.Str::slug($subcategory->subcategory_name, '-'))}}"
                       class="text-decoration-none">
                    <span class="category-type-content">
                        {{ucfirst($subcategory->subcategory_name)}}
                    </span>
                    </a>
                @endforeach
            @endforeach
        </div>
        <div class="mt-2">
            <div class="latest-type">
                <span class="type-title">Most Popular {{ucfirst($value) . " on SolarWorld"}}</span>
                <div class="latest-type-content random-type" id="randomType">
                    @foreach($types::inRandomOrder()->paginate(10) as $type)
                        @foreach($type->file as $file)
                            <div class="type-info">
                                <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/series/'.$file->file_name.'/'.$type->series_thumbnail)}}"
                                         alt="">
                                    <h6>{{$file->file_name}}</h6>
                                    <span class="type-quality">{{$type->series_quality}}</span>
                                    <span class="type-year">({{$type->series_year}})</span>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="type-other-things mt-3">
            <span class="type-title">Take a look at those</span>
            <div class="row">
                @foreach($types::inRandomOrder()->paginate(30) as $type)
                    @foreach($type->file as $file)
                        <div class="type-other-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/series/'.$file->file_name.'/'.$type->series_thumbnail)}}"
                                     id="OtherTypeImg" alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{$file->file_name}}</span>
                                    <span class="type-other-quality">{{$type->series_quality}}</span>
                                    <span class="type-other-year">({{$type->series_year}})</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
         @elseif(strtolower($value)=='games')
        <div class="latest-type">
            <span class="type-title">{{"Latest ".ucfirst($value) . " on SolarWorld"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::orderBy('created_at','DESC')->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/game/'.$file->file_name.'/'.$type->game_thumbnail)}}"
                                     alt="">
                                <h6>{{$file->file_name}}</h6>
                                <span class="type-quality">{{$type->game_version}}</span>
                                <span class="type-year">({{$type->game_year}})</span>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="category-type mt-2">
            <a href="{{URL::to($value.'/latest')}}" class="text-decoration-none ">
                    <span class="category-type-content light-red" style="display: unset;">
                    <i class="fab fa-hotjar"></i> New {{ucfirst($value)}}
                    </span>
            </a>
            <a href="{{URL::to($value.'/top-rated')}}" class="text-decoration-none ">
                    <span class="category-type-content dark-purple" style="display: unset;">
                    <i class="fas fa-chart-line"></i> Top Rated {{ucfirst($value)}}
                    </span>
            </a>
            @foreach($categories::all()->where('id',$categoryNum) as $category)
                @foreach($category->sub_category as $subcategory)
                    <a href="{{URL::to($value.'/cat/'.Str::slug($subcategory->subcategory_name, '-'))}}"
                       class="text-decoration-none">
                    <span class="category-type-content">
                        {{ucfirst($subcategory->subcategory_name)}}
                    </span>
                    </a>
                @endforeach
            @endforeach
        </div>
        <div class="mt-2">
            <div class="latest-type">
                <span class="type-title">Most Popular {{ucfirst($value) . " on SolarWorld"}}</span>
                <div class="latest-type-content random-type" id="randomType">
                    @foreach($types::inRandomOrder()->paginate(10) as $type)
                        @foreach($type->file as $file)
                            <div class="type-info">
                                <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/game/'.$file->file_name.'/'.$type->game_thumbnail)}}"
                                         alt="">
                                    <h6>{{$file->file_name}}</h6>
                                    <span class="type-quality">{{$type->game_version}}</span>
                                    <span class="type-year">({{$type->game_year}})</span>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="type-other-things mt-3">
            <span class="type-title">Take a look at those</span>
            <div class="row">
                @foreach($types::inRandomOrder()->paginate(30) as $type)
                    @foreach($type->file as $file)
                        <div class="type-other-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/game/'.$file->file_name.'/'.$type->game_thumbnail)}}"
                                     id="OtherTypeImg" alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{$file->file_name}}</span>
                                    <span class="type-other-quality">{{$type->game_version}}</span>
                                    <span class="type-other-year">({{$type->game_year}})</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @elseif(strtolower($value) == 'programs')
        <div class="latest-type">
            <span class="type-title">{{"Latest ".ucfirst($value) . " on SolarWorld"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::orderBy('created_at','DESC')->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/program/'.$file->file_name.'/'.$type->program_thumbnail)}}"
                                     alt="">
                                <h6>{{$file->file_name}}</h6>
                                <span class="type-quality">{{$type->program_version}}</span>
                                <span class="type-year">({{$type->program_year}})</span>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="category-type mt-2">
            <a href="{{URL::to($value.'/latest')}}" class="text-decoration-none ">
                    <span class="category-type-content light-red" style="display: unset;">
                    <i class="fab fa-hotjar"></i> New {{ucfirst($value)}}
                    </span>
            </a>
            <a href="{{URL::to($value.'/top-rated')}}" class="text-decoration-none ">
                    <span class="category-type-content dark-purple" style="display: unset;">
                    <i class="fas fa-chart-line"></i> Top Rated {{ucfirst($value)}}
                    </span>
            </a>
            @foreach($categories::all()->where('id',$categoryNum) as $category)
                @foreach($category->sub_category as $subcategory)
                    <a href="{{URL::to($value.'/cat/'.Str::slug($subcategory->subcategory_name, '-'))}}"
                       class="text-decoration-none">
                    <span class="category-type-content">
                        {{ucfirst($subcategory->subcategory_name)}}
                    </span>
                    </a>
                @endforeach
            @endforeach
        </div>
        <div class="mt-2">
            <div class="latest-type">
                <span class="type-title">Most Popular {{ucfirst($value) . " on SolarWorld"}}</span>
                <div class="latest-type-content random-type" id="randomType">
                    @foreach($types::inRandomOrder()->paginate(10) as $type)
                        @foreach($type->file as $file)
                            <div class="type-info">
                                <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/program/'.$file->file_name.'/'.$type->program_thumbnail)}}"
                                         alt="">
                                    <h6>{{$file->file_name}}</h6>
                                    <span class="type-quality">{{$type->program_version}}</span>
                                    <span class="type-year">({{$type->program_year}})</span>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="type-other-things mt-3">
            <span class="type-title">Take a look at those</span>
            <div class="row">
                @foreach($types::inRandomOrder()->paginate(30) as $type)
                    @foreach($type->file as $file)
                        <div class="type-other-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/program/'.$file->file_name.'/'.$type->program_thumbnail)}}"
                                     id="OtherTypeImg" alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{$file->file_name}}</span>
                                    <span class="type-other-quality">{{$type->program_version}}</span>
                                    <span class="type-other-year">({{$type->program_year}})</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @elseif(strtolower($value)=='music')
        <div class="latest-type">
            <span class="type-title">{{"Latest ".ucfirst($value) . " on SolarWorld"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::orderBy('created_at','DESC')->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/music/'.$file->file_name.'/'.$type->music_thumbnail)}}"
                                     alt="">
                                <h6>{{$file->file_name}}</h6>
                                <span class="type-quality">{{$type->music_singer}}</span>
                                <span class="type-year">({{$type->music_year}})</span>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="category-type mt-2">
            <a href="{{URL::to($value.'/latest')}}" class="text-decoration-none ">
                    <span class="category-type-content light-red" style="display: unset;">
                    <i class="fab fa-hotjar"></i> New {{ucfirst($value)}}
                    </span>
            </a>
            <a href="{{URL::to($value.'/top-rated')}}" class="text-decoration-none ">
                    <span class="category-type-content dark-purple" style="display: unset;">
                    <i class="fas fa-chart-line"></i> Top Rated {{ucfirst($value)}}
                    </span>
            </a>
            @foreach($categories::all()->where('id',$categoryNum) as $category)
                @foreach($category->sub_category as $subcategory)
                    <a href="{{URL::to($value.'/cat/'.Str::slug($subcategory->subcategory_name, '-'))}}"
                       class="text-decoration-none">
                    <span class="category-type-content">
                        {{ucfirst($subcategory->subcategory_name)}}
                    </span>
                    </a>
                @endforeach
            @endforeach
        </div>
        <div class="mt-2">
            <div class="latest-type">
                <span class="type-title">Most Popular {{ucfirst($value) . " on SolarWorld"}}</span>
                <div class="latest-type-content random-type" id="randomType">
                    @foreach($types::inRandomOrder()->paginate(10) as $type)
                        @foreach($type->file as $file)
                            <div class="type-info">
                                <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/music/'.$file->file_name.'/'.$type->music_thumbnail)}}"
                                         alt="">
                                    <h6>{{$file->file_name}}</h6>
                                    <span class="type-quality">{{$type->music_singer}}</span>
                                    <span class="type-year">({{$type->music_year}})</span>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="type-other-things mt-3">
            <span class="type-title">Take a look at those</span>
            <div class="row">
                @foreach($types::inRandomOrder()->paginate(30) as $type)
                    @foreach($type->file as $file)
                        <div class="type-other-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/music/'.$file->file_name.'/'.$type->music_thumbnail)}}"
                                     id="OtherTypeImg" alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{$file->file_name}}</span>
                                    <span class="type-other-quality">{{$type->music_singer}}</span>
                                    <span class="type-other-year">({{$type->music_year}})</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @elseif(strtolower($value) == 'anime')
        <div class="latest-type">
            <span class="type-title">{{"Latest ".ucfirst($value) . " on SolarWorld"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::orderBy('created_at','DESC')->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/anime/'.$file->file_name.'/'.$type->anime_thumbnail)}}"
                                     alt="">
                                <h6>{{$file->file_name}}</h6>
                                <span class="type-quality">{{$type->anime_quality}}</span>
                                <span class="type-year">({{$type->anime_year}})</span>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="category-type mt-2">
            <a href="{{URL::to($value.'/latest')}}" class="text-decoration-none ">
                    <span class="category-type-content light-red" style="display: unset;">
                    <i class="fab fa-hotjar"></i> New {{ucfirst($value)}}
                    </span>
            </a>
            <a href="{{URL::to($value.'/top-rated')}}" class="text-decoration-none ">
                    <span class="category-type-content dark-purple" style="display: unset;">
                    <i class="fas fa-chart-line"></i> Top Rated {{ucfirst($value)}}
                    </span>
            </a>
            @foreach($categories::all()->where('id',$categoryNum) as $category)
                @foreach($category->sub_category as $subcategory)
                    <a href="{{URL::to($value.'/cat/'.Str::slug($subcategory->subcategory_name, '-'))}}"
                       class="text-decoration-none">
                    <span class="category-type-content">
                        {{ucfirst($subcategory->subcategory_name)}}
                    </span>
                    </a>
                @endforeach
            @endforeach
        </div>
        <div class="mt-2">
            <div class="latest-type">
                <span class="type-title">Most Popular {{ucfirst($value) . " on SolarWorld"}}</span>
                <div class="latest-type-content random-type" id="randomType">
                    @foreach($types::inRandomOrder()->paginate(10) as $type)
                        @foreach($type->file as $file)
                            <div class="type-info">
                                <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/anime/'.$file->file_name.'/'.$type->anime_thumbnail)}}"
                                         alt="">
                                    <h6>{{$file->file_name}}</h6>
                                    <span class="type-quality">{{$type->anime_quality}}</span>
                                    <span class="type-year">({{$type->anime_year}})</span>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="type-other-things mt-3">
            <span class="type-title">Take a look at those</span>
            <div class="row">
                @foreach($types::inRandomOrder()->paginate(30) as $type)
                    @foreach($type->file as $file)
                        <div class="type-other-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/anime/'.$file->file_name.'/'.$type->anime_thumbnail)}}"
                                     id="OtherTypeImg" alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{$file->file_name}}</span>
                                    <span class="type-other-quality">{{$type->anime_quality}}</span>
                                    <span class="type-other-year">({{$type->anime_year}})</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @endif
    <div id="slickInfo" style="display: none">@if(isset($value)){{$types::count()}}@endif</div>
@endif
@include('layouts.feedback')