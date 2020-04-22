@if(isset($value))
    @if(strtolower($value)== "movies")
        <div class="latest-type">
            <span class="type-title">{{"Latest ".ucfirst($value) . " on SolarWorld"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::orderBy('created_at','DESC')->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/movie/'.$file->file_name.'/'.$type->movie_thumbnail)}}"
                                     alt="">
                                <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
                                <span class="type-quality">{{str_replace('-',' ',$type->movie_quality)}}</span>
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
                                <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/movie/'.$file->file_name.'/'.$type->movie_thumbnail)}}"
                                         alt="">
                                    <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
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
                            <a href="{{URL::to($value.'/'.$file->file_name)}}">

                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/movie/'.$file->file_name.'/'.$type->movie_thumbnail)}}"
                                     id="OtherTypeImg" alt="">

                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{str_replace('-',' ',$file->file_name)}}</span>
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
                @foreach($file::orderBy('created_at','DESC')->where('file_category',$categoryNum)->get()->unique('file_name')->take(10) as $files)
                    @foreach($types::where('file_id',$files->id)->get() as $type)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.$files->file_name)}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/series/'.$files->file_name.'/season-'.$type->series_season.'/'.$type->series_thumbnail)}}"
                                     alt="">
                                <h6>{{$files->file_name}}</h6>
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
                    @foreach($file::inRandomOrder()->where('file_category',$categoryNum)->get()->unique('file_name')->take(10) as $files)
                        @foreach($types::where('file_id',$files->id)->get() as $type)
                            <div class="type-info">
                                <a href="{{URL::to($value.'/'.$files->file_name)}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/series/'.$files->file_name.'/season-'.$type->series_season.'/'.$type->series_thumbnail)}}"
                                         alt="">
                                    <h6>{{$files->file_name}}</h6>
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
                @foreach($file::inRandomOrder()->where('file_category',$categoryNum)->get()->unique('file_name')->take(30) as $files)
                    @foreach($types::where('file_id',$files->id)->get() as $type)
                        <div class="type-other-info">
                            <a href="{{URL::to($value.'/'.$files->file_name)}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/series/'.$files->file_name.'/season-'.$type->series_season.'/'.$type->series_thumbnail)}}"
                                     alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{$files->file_name}}</span>
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
                            <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/game/'.$file->file_name.'/'.$type->game_thumbnail)}}"
                                     alt="">
                                <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
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
                                <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/game/'.$file->file_name.'/'.$type->game_thumbnail)}}"
                                         alt="">
                                    <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
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
                            <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/game/'.$file->file_name.'/'.$type->game_thumbnail)}}"
                                     id="OtherTypeImg" alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{str_replace('-',' ',$file->file_name)}}</span>
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
                            <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/program/'.$file->file_name.'/'.$type->program_thumbnail)}}"
                                     alt="">
                                <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
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
                                <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/program/'.$file->file_name.'/'.$type->program_thumbnail)}}"
                                         alt="">
                                    <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
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
                            <a href="{{URL::to($value.'/'.$file->file_name)}}">
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
                            <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/music/'.$file->file_name.'/'.$type->music_thumbnail)}}"
                                     alt="">
                                <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
                                <span class="type-quality">{{str_replace('-',' ',$type->music_singer)}}</span>
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
                                <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/music/'.$file->file_name.'/'.$type->music_thumbnail)}}"
                                         alt="">
                                    <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
                                    <span class="type-quality">{{str_replace('-',' ',$type->music_singer)}}</span>
                                    <span class="type-year">{{$type->music_year}}</span>
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
                            <a href="{{URL::to($value.'/'.$file->file_name)}}">
                                <img class="type-other-thumbnail"
                                     src="{{asset('storage/main-files/music/'.$file->file_name.'/'.$type->music_thumbnail)}}"
                                     id="OtherTypeImg" alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{str_replace('-',' ',$file->file_name)}}</span>
                                    <span class="type-other-quality">{{str_replace('-',' ',$type->music_singer)}}</span>
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
                @foreach($file::orderBy('created_at','DESC')->where('file_category',$categoryNum)->get()->unique('file_name')->take(10) as $files)
                    @foreach($types::where('file_id',$files->id)->get() as $type)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.$files->file_name)}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/anime/'.$files->file_name.'/season-'.$type->anime_season.'/'.$type->anime_thumbnail)}}"
                                     alt="">
                                <h6>{{$files->file_name}}</h6>
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
                    @foreach($file::inRandomOrder()->where('file_category',$categoryNum)->get()->unique('file_name')->take(10) as $files)
                        @foreach($types::where('file_id',$files->id)->get() as $type)
                            <div class="type-info">
                                <a href="{{URL::to($value.'/'.$files->file_name)}}">
                                    <img class="type-thumbnail"
                                         src="{{asset('storage/main-files/anime/'.$files->file_name.'/season-'.$type->anime_season.'/'.$type->anime_thumbnail)}}"
                                         alt="">
                                    <h6>{{$files->file_name}}</h6>
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
                @foreach($file::inRandomOrder()->where('file_category',$categoryNum)->get()->unique('file_name')->take(30) as $files)
                    @foreach($types::where('file_id',$files->id)->get() as $type)
                        <div class="type-other-info">
                            <a href="{{URL::to($value.'/'.$files->file_name)}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/anime/'.$files->file_name.'/season-'.$type->anime_season.'/'.$type->anime_thumbnail)}}"
                                     alt="">
                                <div class="type-other-info-plus">
                                    <span class="type-other-name">{{$files->file_name}}</span>
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
    <div id="slickInfo" style="display: none">@if(isset($value)){{$file::where('file_category',$categoryNum)->distinct('file_name')->count()}}@endif</div>
@else

    <div class="latest-type">
        <span class="type-title">Latest Movies on SolarWorld</span>
        <div class="latest-type-content" id="latestType">
            @foreach($files::orderBy('created_at','DESC')->where('file_category','1')->get()->take(10) as $file)
                @foreach($movies::where('file_id',$file->id)->get() as $movie)
                    <div class="type-info">
                        <a href="{{URL::to('movies/'.$file->file_name)}}">
                            <img class="type-thumbnail"
                                 src="{{asset('storage/main-files/movie/'.$file->file_name.'/'.$movie->movie_thumbnail)}}"
                                 alt="">
                            <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
                            <span class="type-quality">{{str_replace('-',' ',$movie->movie_quality)}}</span>
                            <span class="type-year">({{$movie->movie_year}})</span>
                        </a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="latest-type">
        <span class="type-title">Latest Series on SolarWorld</span>
        <div class="latest-type-content" id="latestType">
            @foreach($files::orderBy('created_at','DESC')->where('file_category','2')->get()->take(10) as $file)
                @foreach($series::where('file_id',$file->id)->get() as $seriess)
                    <div class="type-info">
                        <a href="{{URL::to('movies/'.$file->file_name)}}">
                            <img class="type-thumbnail"
                                 src="{{asset('storage/main-files/series/'.$file->file_name.'/season-'.$seriess->series_season . '/'.$seriess->series_thumbnail)}}"
                                 alt="">
                            <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
                            <span class="type-quality">{{str_replace('-',' ',$seriess->series_quality)}}</span>
                            <span class="type-year">({{$seriess->series_year}})</span>
                        </a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="latest-type">
        <span class="type-title">Latest Music on SolarWorld</span>
        <div class="latest-type-content">
            @foreach($files::orderBy('created_at','DESC')->where('file_category','3')->get()->take(10) as $file)
                @foreach($musics::where('file_id',$file->id)->get() as $music)
                    <div class="type-info">
                        <a href="{{URL::to('movies/'.$file->file_name)}}">
                            <img class="type-thumbnail"
                                 src="{{asset('storage/main-files/music/'.$file->file_name.'/'.$music->music_thumbnail)}}"
                                 alt="">
                            <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
                            <span class="type-quality">{{str_replace('-',' ',$music->music_singer)}}</span>
                            <span class="type-year">({{$music->music_year}})</span>
                        </a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>


    <div id="slickInfo" style="display: none">10</div>
@endif
@include('layouts.feedback')