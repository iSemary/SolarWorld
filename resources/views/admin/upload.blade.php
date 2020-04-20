@extends('layouts.app')
@section('stylesheets')
@endsection
@section('content')
    <nav class="navbar admin-nav navbar-expand-lg navbar-light bg-light" style="box-shadow: 0px 0px 14px #f8f9faa6;">
        <a class="navbar-brand" href="/">Solar World</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('admin.upload')}}">Upload</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link"  href="{{route('admin.users_show')}}">Administrators</a>
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
            <div class="col-12">
                <div class="form-group" style="width: 500px;margin: 70px auto;">
                    <form  method="POST" id="file-upload-form" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file_type_select">Select type of file</label>
                            <select class="form-control" id="file_type_select" name="file_type">
                                <option value="">Select type of file</option>
                                @foreach($categories::all() as $category)
                                    <option value="{{$category->category_name}}">{{ucfirst($category->category_name)}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--        Load div here                --}}

                        <div class="itemSelected" id="movieSelected">
                            <h6>Movie</h6>
                            <div class="form-group">
                                <label for="">Movie Name</label>
                                <input type="text"   name="file_name" id="file_name" class="form-control" placeholder="Movie Name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Movie Quality</label>
                                <select class="form-control" disabled name="movie_quality">
                                    <option value="4K">4K</option>
                                    <option value="HD">HD</option>
                                    <option value="Blue-Ray">Blue-Ray</option>
                                    <option value="1080P">1080P</option>
                                    <option value="720P">720P</option>
                                    <option value="SD">SD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Movie Category</label>
                                <select class="form-control" id="movie_category" disabled name="movie_sub_category">
                                    @foreach($categories::where('id','1')->get() as $category)
                                        @foreach($category->sub_category->all() as $sub_categories)
                                            <option
                                                    value="{{$sub_categories->id}}">
                                                {{ucfirst($sub_categories->subcategory_name)}}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Movie Year</label>
                                {!! Form::selectYear('year', 1900, 2020, null ,['class' => 'form-control', 'name' => 'movie_year' ,'disabled']) !!}
                            </div>

                            <div class="form-group">
                                <label for="">Movie Language</label>
                                <select disabled name="movie_language" class="form-control">
                                    <option value="AF">Afrikaans</option>
                                    <option value="SQ">Albanian</option>
                                    <option value="AR">Arabic</option>
                                    <option value="HY">Armenian</option>
                                    <option value="EU">Basque</option>
                                    <option value="BN">Bengali</option>
                                    <option value="BG">Bulgarian</option>
                                    <option value="CA">Catalan</option>
                                    <option value="KM">Cambodian</option>
                                    <option value="ZH">Chinese (Mandarin)</option>
                                    <option value="HR">Croatian</option>
                                    <option value="CS">Czech</option>
                                    <option value="DA">Danish</option>
                                    <option value="NL">Dutch</option>
                                    <option value="EN" selected>English</option>
                                    <option value="ET">Estonian</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finnish</option>
                                    <option value="FR">French</option>
                                    <option value="KA">Georgian</option>
                                    <option value="DE">German</option>
                                    <option value="EL">Greek</option>
                                    <option value="GU">Gujarati</option>
                                    <option value="HE">Hebrew</option>
                                    <option value="HI">Hindi</option>
                                    <option value="HU">Hungarian</option>
                                    <option value="IS">Icelandic</option>
                                    <option value="ID">Indonesian</option>
                                    <option value="GA">Irish</option>
                                    <option value="IT">Italian</option>
                                    <option value="JA">Japanese</option>
                                    <option value="JW">Javanese</option>
                                    <option value="KO">Korean</option>
                                    <option value="LA">Latin</option>
                                    <option value="LV">Latvian</option>
                                    <option value="LT">Lithuanian</option>
                                    <option value="MK">Macedonian</option>
                                    <option value="MS">Malay</option>
                                    <option value="ML">Malayalam</option>
                                    <option value="MT">Maltese</option>
                                    <option value="MI">Maori</option>
                                    <option value="MR">Marathi</option>
                                    <option value="MN">Mongolian</option>
                                    <option value="NE">Nepali</option>
                                    <option value="NO">Norwegian</option>
                                    <option value="FA">Persian</option>
                                    <option value="PL">Polish</option>
                                    <option value="PT">Portuguese</option>
                                    <option value="PA">Punjabi</option>
                                    <option value="QU">Quechua</option>
                                    <option value="RO">Romanian</option>
                                    <option value="RU">Russian</option>
                                    <option value="SM">Samoan</option>
                                    <option value="SR">Serbian</option>
                                    <option value="SK">Slovak</option>
                                    <option value="SL">Slovenian</option>
                                    <option value="ES">Spanish</option>
                                    <option value="SW">Swahili</option>
                                    <option value="SV">Swedish</option>
                                    <option value="TA">Tamil</option>
                                    <option value="TT">Tatar</option>
                                    <option value="TE">Telugu</option>
                                    <option value="TH">Thai</option>
                                    <option value="BO">Tibetan</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TR">Turkish</option>
                                    <option value="UK">Ukrainian</option>
                                    <option value="UR">Urdu</option>
                                    <option value="UZ">Uzbek</option>
                                    <option value="VI">Vietnamese</option>
                                    <option value="CY">Welsh</option>
                                    <option value="XH">Xhosa</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Movie thumbnail</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose thumbnail</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="movieThumbnail">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Movie File</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="movieFile" value="">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="itemSelected" id="seriesSelected">
                            <h6>Series</h6>
                            <div class="form-group">
                                <label for="">Series Name</label>
                                <input type="text" disabled name="file_name" id="file_name" class="form-control" placeholder="Series Name">
                            </div>
                            <div class="form-group">
                                <label for="">Series Quality</label>
                                <select class="form-control" disabled name="series_quality">
                                    <option value="4K">4K</option>
                                    <option value="HD">HD</option>
                                    <option value="Blue-Ray">Blue-Ray</option>
                                    <option value="1080P">1080P</option>
                                    <option value="720P">720P</option>
                                    <option value="SD">SD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Series Category</label>
                                <select class="form-control" id="series_sub_category" disabled name="series_sub_category">
                                    @foreach($categories::where('id','2')->get() as $category)
                                        @foreach($category->sub_category->all() as $sub_categories)
                                            <option
                                                    value="{{$sub_categories->id}}">
                                                {{ucfirst($sub_categories->subcategory_name)}}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Series Year</label>
                                {!! Form::selectYear('year', 1900, 2020, null ,['class' => 'form-control', 'name' => 'series_year','disabled']) !!}
                            </div>

                            <div class="form-group">
                                <label for="">Series Language</label>
                                <select disabled name="series_language" class="form-control">
                                    <option value="AF">Afrikaans</option>
                                    <option value="SQ">Albanian</option>
                                    <option value="AR">Arabic</option>
                                    <option value="HY">Armenian</option>
                                    <option value="EU">Basque</option>
                                    <option value="BN">Bengali</option>
                                    <option value="BG">Bulgarian</option>
                                    <option value="CA">Catalan</option>
                                    <option value="KM">Cambodian</option>
                                    <option value="ZH">Chinese (Mandarin)</option>
                                    <option value="HR">Croatian</option>
                                    <option value="CS">Czech</option>
                                    <option value="DA">Danish</option>
                                    <option value="NL">Dutch</option>
                                    <option value="EN" selected>English</option>
                                    <option value="ET">Estonian</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finnish</option>
                                    <option value="FR">French</option>
                                    <option value="KA">Georgian</option>
                                    <option value="DE">German</option>
                                    <option value="EL">Greek</option>
                                    <option value="GU">Gujarati</option>
                                    <option value="HE">Hebrew</option>
                                    <option value="HI">Hindi</option>
                                    <option value="HU">Hungarian</option>
                                    <option value="IS">Icelandic</option>
                                    <option value="ID">Indonesian</option>
                                    <option value="GA">Irish</option>
                                    <option value="IT">Italian</option>
                                    <option value="JA">Japanese</option>
                                    <option value="JW">Javanese</option>
                                    <option value="KO">Korean</option>
                                    <option value="LA">Latin</option>
                                    <option value="LV">Latvian</option>
                                    <option value="LT">Lithuanian</option>
                                    <option value="MK">Macedonian</option>
                                    <option value="MS">Malay</option>
                                    <option value="ML">Malayalam</option>
                                    <option value="MT">Maltese</option>
                                    <option value="MI">Maori</option>
                                    <option value="MR">Marathi</option>
                                    <option value="MN">Mongolian</option>
                                    <option value="NE">Nepali</option>
                                    <option value="NO">Norwegian</option>
                                    <option value="FA">Persian</option>
                                    <option value="PL">Polish</option>
                                    <option value="PT">Portuguese</option>
                                    <option value="PA">Punjabi</option>
                                    <option value="QU">Quechua</option>
                                    <option value="RO">Romanian</option>
                                    <option value="RU">Russian</option>
                                    <option value="SM">Samoan</option>
                                    <option value="SR">Serbian</option>
                                    <option value="SK">Slovak</option>
                                    <option value="SL">Slovenian</option>
                                    <option value="ES">Spanish</option>
                                    <option value="SW">Swahili</option>
                                    <option value="SV">Swedish</option>
                                    <option value="TA">Tamil</option>
                                    <option value="TT">Tatar</option>
                                    <option value="TE">Telugu</option>
                                    <option value="TH">Thai</option>
                                    <option value="BO">Tibetan</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TR">Turkish</option>
                                    <option value="UK">Ukrainian</option>
                                    <option value="UR">Urdu</option>
                                    <option value="UZ">Uzbek</option>
                                    <option value="VI">Vietnamese</option>
                                    <option value="CY">Welsh</option>
                                    <option value="XH">Xhosa</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Series thumbnail</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose thumbnail</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="seriesThumbnail">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Series File</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="seriesFile">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="itemSelected" id="musicSelected">
                            <h6>Music</h6>
                            <div class="form-group">
                                <label for="">Music Name</label>
                                <input type="text" disabled name="file_name" id="file_name" class="form-control" placeholder="Music Name">
                            </div>
                            <div class="form-group">
                                <label for="">Album Name</label>
                                <input type="text" disabled name="music_album" id="music_album" class="form-control" placeholder="Album Name">
                            </div>
                            <div class="form-group">
                                <label for="">Singer Name</label>
                                <input type="text" disabled name="music_singer" id="music_singer" class="form-control" placeholder="Singer Name">
                            </div>
                            <div class="form-group">
                                <label for="">Music Category</label>
                                <select class="form-control" id="music_sub_category" disabled name="music_sub_category">
                                    @foreach($categories::where('id','3')->get() as $category)
                                        <option
                                                value="{{$category->sub_category->first()->id}}">
                                            {{ucfirst($category->sub_category->first()->subcategory_name)}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Music Year</label>
                                {!! Form::selectYear('year', 1900, 2020, null ,['class' => 'form-control', 'name' => 'music_year','disabled']) !!}
                            </div>

                            <div class="form-group">
                                <label for="">Music Language</label>
                                <select disabled name="music_language" class="form-control">
                                    <option value="AF">Afrikaans</option>
                                    <option value="SQ">Albanian</option>
                                    <option value="AR">Arabic</option>
                                    <option value="HY">Armenian</option>
                                    <option value="EU">Basque</option>
                                    <option value="BN">Bengali</option>
                                    <option value="BG">Bulgarian</option>
                                    <option value="CA">Catalan</option>
                                    <option value="KM">Cambodian</option>
                                    <option value="ZH">Chinese (Mandarin)</option>
                                    <option value="HR">Croatian</option>
                                    <option value="CS">Czech</option>
                                    <option value="DA">Danish</option>
                                    <option value="NL">Dutch</option>
                                    <option value="EN" selected>English</option>
                                    <option value="ET">Estonian</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finnish</option>
                                    <option value="FR">French</option>
                                    <option value="KA">Georgian</option>
                                    <option value="DE">German</option>
                                    <option value="EL">Greek</option>
                                    <option value="GU">Gujarati</option>
                                    <option value="HE">Hebrew</option>
                                    <option value="HI">Hindi</option>
                                    <option value="HU">Hungarian</option>
                                    <option value="IS">Icelandic</option>
                                    <option value="ID">Indonesian</option>
                                    <option value="GA">Irish</option>
                                    <option value="IT">Italian</option>
                                    <option value="JA">Japanese</option>
                                    <option value="JW">Javanese</option>
                                    <option value="KO">Korean</option>
                                    <option value="LA">Latin</option>
                                    <option value="LV">Latvian</option>
                                    <option value="LT">Lithuanian</option>
                                    <option value="MK">Macedonian</option>
                                    <option value="MS">Malay</option>
                                    <option value="ML">Malayalam</option>
                                    <option value="MT">Maltese</option>
                                    <option value="MI">Maori</option>
                                    <option value="MR">Marathi</option>
                                    <option value="MN">Mongolian</option>
                                    <option value="NE">Nepali</option>
                                    <option value="NO">Norwegian</option>
                                    <option value="FA">Persian</option>
                                    <option value="PL">Polish</option>
                                    <option value="PT">Portuguese</option>
                                    <option value="PA">Punjabi</option>
                                    <option value="QU">Quechua</option>
                                    <option value="RO">Romanian</option>
                                    <option value="RU">Russian</option>
                                    <option value="SM">Samoan</option>
                                    <option value="SR">Serbian</option>
                                    <option value="SK">Slovak</option>
                                    <option value="SL">Slovenian</option>
                                    <option value="ES">Spanish</option>
                                    <option value="SW">Swahili</option>
                                    <option value="SV">Swedish</option>
                                    <option value="TA">Tamil</option>
                                    <option value="TT">Tatar</option>
                                    <option value="TE">Telugu</option>
                                    <option value="TH">Thai</option>
                                    <option value="BO">Tibetan</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TR">Turkish</option>
                                    <option value="UK">Ukrainian</option>
                                    <option value="UR">Urdu</option>
                                    <option value="UZ">Uzbek</option>
                                    <option value="VI">Vietnamese</option>
                                    <option value="CY">Welsh</option>
                                    <option value="XH">Xhosa</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Music thumbnail</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose thumbnail</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="musicThumbnail">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Music File</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="musicFile">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="itemSelected" id="animeSelected">
                            <h6>Anime</h6>
                            <div class="form-group">
                                <label for="">Anime Name</label>
                                <input type="text" disabled name="file_name" id="file_name" class="form-control" placeholder="Anime Name">
                            </div>
                            <div class="form-group">
                                <label for="">Anime Quality</label>
                                <select class="form-control" disabled name="anime_quality">
                                    <option value="4K">4K</option>
                                    <option value="HD">HD</option>
                                    <option value="Blue-Ray">Blue-Ray</option>
                                    <option value="1080P">1080P</option>
                                    <option value="720P">720P</option>
                                    <option value="SD">SD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Anime Category</label>
                                <select class="form-control" id="anime_sub_category" disabled name="anime_sub_category">
                                    @foreach($categories::where('id','4')->get() as $category)
                                        @foreach($category->sub_category->all() as $sub_categories)
                                            <option
                                                    value="{{$sub_categories->id}}">
                                                {{ucfirst($sub_categories->subcategory_name)}}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Anime Year</label>
                                {!! Form::selectYear('year', 1900, 2020, null ,['class' => 'form-control', 'name' => 'anime_year','disabled']) !!}
                            </div>

                            <div class="form-group">
                                <label for="">Anime Language</label>
                                <select disabled name="anime_language" class="form-control">
                                    <option value="AF">Afrikaans</option>
                                    <option value="SQ">Albanian</option>
                                    <option value="AR">Arabic</option>
                                    <option value="HY">Armenian</option>
                                    <option value="EU">Basque</option>
                                    <option value="BN">Bengali</option>
                                    <option value="BG">Bulgarian</option>
                                    <option value="CA">Catalan</option>
                                    <option value="KM">Cambodian</option>
                                    <option value="ZH">Chinese (Mandarin)</option>
                                    <option value="HR">Croatian</option>
                                    <option value="CS">Czech</option>
                                    <option value="DA">Danish</option>
                                    <option value="NL">Dutch</option>
                                    <option value="EN" selected>English</option>
                                    <option value="ET">Estonian</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finnish</option>
                                    <option value="FR">French</option>
                                    <option value="KA">Georgian</option>
                                    <option value="DE">German</option>
                                    <option value="EL">Greek</option>
                                    <option value="GU">Gujarati</option>
                                    <option value="HE">Hebrew</option>
                                    <option value="HI">Hindi</option>
                                    <option value="HU">Hungarian</option>
                                    <option value="IS">Icelandic</option>
                                    <option value="ID">Indonesian</option>
                                    <option value="GA">Irish</option>
                                    <option value="IT">Italian</option>
                                    <option value="JA">Japanese</option>
                                    <option value="JW">Javanese</option>
                                    <option value="KO">Korean</option>
                                    <option value="LA">Latin</option>
                                    <option value="LV">Latvian</option>
                                    <option value="LT">Lithuanian</option>
                                    <option value="MK">Macedonian</option>
                                    <option value="MS">Malay</option>
                                    <option value="ML">Malayalam</option>
                                    <option value="MT">Maltese</option>
                                    <option value="MI">Maori</option>
                                    <option value="MR">Marathi</option>
                                    <option value="MN">Mongolian</option>
                                    <option value="NE">Nepali</option>
                                    <option value="NO">Norwegian</option>
                                    <option value="FA">Persian</option>
                                    <option value="PL">Polish</option>
                                    <option value="PT">Portuguese</option>
                                    <option value="PA">Punjabi</option>
                                    <option value="QU">Quechua</option>
                                    <option value="RO">Romanian</option>
                                    <option value="RU">Russian</option>
                                    <option value="SM">Samoan</option>
                                    <option value="SR">Serbian</option>
                                    <option value="SK">Slovak</option>
                                    <option value="SL">Slovenian</option>
                                    <option value="ES">Spanish</option>
                                    <option value="SW">Swahili</option>
                                    <option value="SV">Swedish</option>
                                    <option value="TA">Tamil</option>
                                    <option value="TT">Tatar</option>
                                    <option value="TE">Telugu</option>
                                    <option value="TH">Thai</option>
                                    <option value="BO">Tibetan</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TR">Turkish</option>
                                    <option value="UK">Ukrainian</option>
                                    <option value="UR">Urdu</option>
                                    <option value="UZ">Uzbek</option>
                                    <option value="VI">Vietnamese</option>
                                    <option value="CY">Welsh</option>
                                    <option value="XH">Xhosa</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">Anime thumbnail</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose thumbnail</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="animeThumbnail">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Anime File</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="animeFile">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="itemSelected" id="programSelected">
                            <h6>Program</h6>
                            <div class="form-group">
                                <label for="">Program Name</label>
                                <input type="text" disabled name="file_name" id="file_name" class="form-control" placeholder="Program Name">
                            </div>
                            <div class="form-group">
                                <label for="">Program Version</label>
                                <input type="text" disabled name="program_version" id="program_version" class="form-control"
                                       placeholder="Program Version">
                            </div>
                            <div class="form-group">
                                <label for="">Program Category</label>
                                <select class="form-control" id="program_category" disabled name="program_sub_category">
                                    @foreach($categories::where('id','6')->get() as $category)
                                        @foreach($category->sub_category->all() as $sub_categories)
                                            <option
                                                    value="{{$sub_categories->id}}">
                                                {{ucfirst($sub_categories->subcategory_name)}}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Program Year</label>
                                {!! Form::selectYear('year', 1900, 2020, null ,['class' => 'form-control', 'name' => 'program_year','disabled']) !!}
                            </div>


                            <div class="form-group">
                                <label for="">Program thumbnail</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose thumbnail</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="programThumbnail">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Program File</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="programFile">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="itemSelected" id="gameSelected">
                            <h6>Game</h6>
                            <div class="form-group">
                                <label for="">Game Name</label>
                                <input type="text" disabled name="file_name" id="file_name" class="form-control" placeholder="Game Name">
                            </div>
                            <div class="form-group">
                                <label for="">Game Version</label>
                                <input type="text" disabled name="game_version" id="game_version" class="form-control" placeholder="Game Version">
                            </div>
                            <div class="form-group">
                                <label for="">Game Category</label>
                                <select class="form-control" id="game_category" disabled name="game_sub_category">
                                        @foreach($categories::where('id','5')->get() as $category)
                                            @foreach($category->sub_category->all() as $sub_categories)
                                                <option
                                                        value="{{$sub_categories->id}}">
                                                    {{ucfirst($sub_categories->subcategory_name)}}
                                                </option>
                                            @endforeach
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Game Year</label>
                                {!! Form::selectYear('year', 1900, 2020, null ,['class' => 'form-control', 'name' => 'game_year','disabled']) !!}
                            </div>


                            <div class="form-group">
                                <label for="">Game thumbnail</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose thumbnail</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="gameThumbnail">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Game File</label>
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" disabled name="gameFile">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <button class="btn btn-primary" type="submit">Upload File</button>
                    </form>
                </div>


        </div>
    </div>
    </div>
    <div id="result"></div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            let ProgressDiv = '<div class="progress-file-section"> <div class="progress"> <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div><span class="progress-number">0%</span> </div><div id="success"></div></div>';

            $('#file-upload-form').on('submit',function(event) {
                event.preventDefault();
                $.ajax({
                    url:'{{route("ajax.uploadfile")}}',
                    method:"POST",
                    data: new FormData(this),
                    dataType:"json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function(wait){
                        $('#success').empty();
                        $('.progress-bar').css('width','0%');
                        $('.progress-number').text('0%');

                        swal.fire({
                            title: "Please wait, Your file is being processing...",
                            html: ProgressDiv,
                            imageUrl: '{{asset('storage/main-content/Slow-Loading.gif')}}',
                            imageWidth: 200,
                            imageHeight: 200,
                            showConfirmButton:false,
                            imageAlt: 'Loading',
                        });
                    },
                    xhr:function(event, position,total,percentComplete){
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = (evt.loaded / evt.total) * 100;

                                $('.progress-bar').css('width',percentComplete + '%');
                                $('.progress-number').text(percentComplete.toFixed(2) + '%');


                            }
                        }, false);
                        return xhr;

                    },
                    success:function (response) {
                        if (!response) {
                            swal.fire('Cheer !','Your file uploaded successfully.','success');
                            $('.progress-number').text('Uploaded');
                            $('.progress-bar').css('width','100%');
                        }else {
                            swal.fire('Oops! Something is wrong !',response,'error');
                            $('.progress-number').text('0%');
                            $('.progress-bar').css('width','0%');
                        }
                    }
                });
            });
        });

    </script>
    <script>
        $(document).ready(function () {
                $('input[type="file"]').on('change', function () {
                let filename = $(this).val();
                    if (/^\s*$/.test(filename)) {
                        $(this).closest('.file-upload').removeClass('active');
                        $(this).prev('#noFile').text("No file chosen...");
                    }
                    else {
                        $(this).closest('.file-upload').addClass('active');
                        $(this).prev('#noFile').text(filename.replace("C:\\fakepath\\", ""));
                    }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#file_type_select').on('change',function () {
                let fileTypeName = $(this).val();
                let fileTypeNameID = "#"+fileTypeName+"Selected";

                $('.itemSelected').hide().find('select, input').prop('disabled',true);
                $(fileTypeNameID).fadeIn(500);

                $(fileTypeNameID).find('select, input').prop('disabled',false);
            });
        });
    </script>
@endsection