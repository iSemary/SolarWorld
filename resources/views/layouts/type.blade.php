@if($value == "movies")
    <div class="type-player">
        <div class="type-player-info mb-3">
            <div class="type-player-name">
                {{str_replace('-',' ',$file::where('file_name',$filename)->first()->file_name)}}
                <span>
                    {{$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->movie_quality}}
                </span>
            </div>
            <span>
                <small class="type-player-time"><i class="far fa-clock"></i>
                    {{$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->movie_duration}}
                </small>
            </span>
        </div>
        <video poster="{{asset('storage/'.
    $file::where('file_name',$filename)->first()->file_path .$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->movie_thumbnail)}}"
               id="moviePlayer" playsinline controls>
            <source src="{{asset('storage/'.
    $file::where('file_name',$filename)->first()->file_path .$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->file_name)}}"
                    type="video/mp4"/>
        </video>
    </div>
    <div class="type-also-like">
        <div class="latest-type">
            <span class="type-title">{{"You may also like"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::where('movie_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->movie_sub_category)->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
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
    <div id="slickInfo"
         style="display: none">@if(isset($value)){{$types::where('movie_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->movie_sub_category)->count()}}@endif</div>

@elseif($value == 'series')


    <div class="type-player">
        <div class="type-player-info mb-3">
            <div class="type-player-name">
                {{$file::where('file_name',$filename)->first()->file_name}}
                <h5>Season 1 - episode 1</h5>
                <span>
                    {{$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->series_quality}}
                </span>
            </div>
            <span>
                <small class="type-player-time"><i class="far fa-clock"></i>
                    {{$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->series_duration}}
                </small>
            </span>
        </div>
        <video poster="{{asset('storage/'.
    $file::where('file_name',$filename)->first()->file_path .'season-'. $types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->series_season .'/'.$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->series_thumbnail)}}"
               id="moviePlayer" playsinline controls>
            <source src="{{asset('storage/'.
    $file::where('file_name',$filename)->first()->file_path .'season-'. $types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->series_season .'/'.$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->file_name)}}"
                    type="video/mp4"/>
        </video>
    </div>

    <div class="latest-type">
        Other Episodes
        <div class="latest-type-content" id="latestType">

        </div>
    </div>

    <div class="type-also-like">
        <div class="latest-type">
            <span class="type-title">{{"You may also like"}}</span>
            <div class="latest-type-content" id="latestType">

            </div>
        </div>
    </div>



    <div id="slickInfo"
         style="display: none">@if(isset($value)){{$types::where('series_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->series_sub_category)->count()}}@endif</div>

@elseif($value == 'anime')


@elseif($value == 'music')
    <div class="type-player">
        <div class="type-player-info mb-3">
            <div class="type-player-name">
                {{str_replace('-',' ',$file::where('file_name',$filename)->first()->file_name)}}
                <span>
                    {{str_replace('-',' ',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->music_singer)}}
                </span>
                <span>
                    {{str_replace('-',' ',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->music_album)}}
                </span>
            </div>
            <span>
                <small class="type-player-time"><i class="far fa-clock"></i>
                    {{$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->music_duration}}
                </small>
            </span>
            <div class="mt-2">
                <img src="{{asset('storage/'.
    $file::where('file_name',$filename)->first()->file_path .$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->music_thumbnail)}}"
                     width="150px" alt="music-thumbnail">
            </div>
        </div>
        <audio id="MusicPlayer" controls>
            <source src="{{asset('storage/'.
    $file::where('file_name',$filename)->first()->file_path .$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->file_name)}}"
                    type="audio/mp3"/>
        </audio>
    </div>
    <div class="type-also-like">
        <div class="latest-type">
            <span class="type-title">{{"You may also like"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::where('music_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->music_sub_category)->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/music/'.$file->file_name.'/'.$type->music_thumbnail)}}"
                                     alt="">
                                <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
                                <span class="type-quality">{{str_replace('-',' ',$type->music_singer)}}</span>
                                <span class="type-year">({{str_replace('-',' ',$type->music_year)}})</span>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <div id="slickInfo"
         style="display: none">@if(isset($value)){{$types::where('music_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->music_sub_category)->count()}}@endif</div>




@elseif($value == 'games')
    <div class="type-description">
        <div class="type-player-info mb-3">
            <div class="type-player-name">
                {{str_replace('-',' ',$file::where('file_name',$filename)->first()->file_name)}}
                <span>
                    {{$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->game_version}}
                </span>
            </div>
            <div class="mt-2">
                <img class="mb-2" src="{{asset('storage/'.
    $file::where('file_name',$filename)->first()->file_path .$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->game_thumbnail)}}"
                     width="150px" alt="game-thumbnail"><br>
                <small class="type-file-size dark-blue p-2 mt-2"><i class="far fa-file-archive"></i>
                    {{ \App\Http\Controllers\FunctionsController::show_size($types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->game_size)}}
                </small>
            </div>
        </div>
        <div class="type-description-content">


            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, inventore ipsa iste nostrum obcaecati officia optio perferendis perspiciatis quam, quia quis ratione rem repellat, sint temporibus unde voluptas. Aspernatur, deserunt?
            <div>
                <form action="{{route('view.download.file',$file::where('file_name',$filename)->first()->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn light-red" name="fileDownload"><i class="fas fa-download"></i> Direct Download</button>
                </form>
            </div>
        </div>
    </div>
    <div class="type-also-like">
        <div class="latest-type">
            <span class="type-title">{{"You may also like"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::where('game_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->game_sub_category)->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/game/'.$file->file_name.'/'.$type->game_thumbnail)}}"
                                     alt="">
                                <h6>{{$file->file_name}}</h6>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <div id="slickInfo"
         style="display: none">@if(isset($value)){{$types::where('game_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->game_sub_category)->count()}}@endif</div>


@elseif($value == 'programs')
    <div class="type-description">
        <div class="type-player-info mb-3">
            <div class="type-player-name">
                {{str_replace('-',' ',$file::where('file_name',$filename)->first()->file_name)}}
                <span>
                    {{$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->program_version}}
                </span>
            </div>
            <div class="mt-2">
                <img class="mb-2" src="{{asset('storage/'.
    $file::where('file_name',$filename)->first()->file_path .$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->program_thumbnail)}}"
                     width="150px" alt="program-thumbnail"><br>
                <small class="type-file-size dark-blue p-2 mt-2"><i class="far fa-file-archive"></i>
                    {{ \App\Http\Controllers\FunctionsController::show_size($types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->program_size)}}
                </small>
            </div>
        </div>
        <div class="type-description-content">


            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, inventore ipsa iste nostrum obcaecati officia optio perferendis perspiciatis quam, quia quis ratione rem repellat, sint temporibus unde voluptas. Aspernatur, deserunt?
            <div>
                <form action="{{route('view.download.file',$file::where('file_name',$filename)->first()->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn light-red" name="fileDownload"><i class="fas fa-download"></i> Direct Download</button>
                </form>
            </div>
        </div>
    </div>
    <div class="type-also-like">
        <div class="latest-type">
            <span class="type-title">{{"You may also like"}}</span>
            <div class="latest-type-content" id="latestType">
                @foreach($types::where('program_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->program_sub_category)->paginate(10) as $type)
                    @foreach($type->file as $file)
                        <div class="type-info">
                            <a href="{{URL::to($value.'/'.Str::slug($file->file_name, '-'))}}">
                                <img class="type-thumbnail"
                                     src="{{asset('storage/main-files/program/'.$file->file_name.'/'.$type->program_thumbnail)}}"
                                     alt="">
                                <h6>{{str_replace('-',' ',$file->file_name)}}</h6>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <div id="slickInfo"
         style="display: none">@if(isset($value)){{$types::where('program_sub_category',$types::where('file_id',$file::where('file_name',$filename)->first()->id)->first()->program_sub_category)->count()}}@endif</div>
@endif