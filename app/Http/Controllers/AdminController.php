<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

use \Validator;


// SOLARWORLD MODELS
use App\Category;
use App\File;

use App\Movie;
use App\Series;
use App\Anime;
use App\Music;
use App\Game;
use App\Program;


class AdminController extends Controller {
    public function index() {
        toast('Welcome to Dashboard<br> "Here you can see whats happening on your website!"', 'success');


        return view('admin.dashboard',
                 ['users' => 'App\User', 'files' => 'App\File', 'category' => 'App\Category', 'sub_category' => 'App\Sub_Category',
                'movies' => 'App\Movie', 'series' => 'App\Series', 'musics' => 'App\Music', 'anime' => 'App\Anime',
                'programs' => 'App\Program', 'games' => 'App\Game', 'others' => 'App\Other']);
    }


    public function upload() {
        toast('Welcome to Uploading Factory<br>"Here you can upload content and files to your website!"', 'success');
        return view('admin.upload')->with('categories', Category::class)->with('success', 'Post');
    }

    public function store(Request $request) {

        $fileType = $request->file_type;
        if ($fileType == "movie") {

            // Validate File
            $validator = Validator::make($request->all(), [
                'file_name' => 'required|unique:downloads_infos',
                'movie_quality' => 'required',
                'movie_sub_category' => 'required',
                'movieThumbnail' => 'required',
                'movie_year' => 'required',
                'movie_language' => 'required',
                'movieFile' => 'required|mimes:mp4,mov,ogg,avi,wmv,m3u8,ts,mov,qt',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->first());
            } elseif (File::where('file_hash_key', md5($request->movieFile))->count() > 0) {
                return response()->json('File already exist');
            }


            // Uploading File

            $MovieStore = $request->movieFile->store('main-files/movie/' . $request->file_name, 'public');
            $MovieThumbnialStore = $request->movieThumbnail->store('main-files/movie/' . $request->file_name, 'public');

            // Movie Duration

            $getID3 = new \getID3;
            $getFile = $getID3->analyze($request->movieFile);
            $duration = date('H:i:s.v', $getFile['playtime_seconds']);

            // Upload File Data to DB

            $File = File::create([
                'file_name' => $request->file_name,
                'file_path' => 'main-files/movie/' . $request->file_name . '/',
                'file_category' => '1',
                'file_hash_key' => md5($request->movieFile),
                'username_uploaded' => auth::user()->user_name
            ]);

            // Upload Movie Data To DB

            $Movie = Movie::create([
                'file_id' => $File->id,
                'file_uploaded_name' => $request->movieFile->getClientOriginalName(),
                'file_name' => $request->movieFile->hashName(),
                'movie_size' => $request->movieFile->getSize(),
                'movie_quality' => $request->movie_quality,
                'movie_sub_category' => $request->movie_sub_category,
                'movie_thumbnail' => $request->movieThumbnail->hashName(),
                'movie_year' => $request->movie_year,
                'movie_duration' => $duration,
                'movie_language' => $request->movie_language,
            ]);


            return response()->json('');


        }
        elseif ($fileType == "series") {
            // Validate File
            $validator = Validator::make($request->all(), [
                'file_name' => 'required|unique:downloads_infos',
                'series_quality' => 'required',
                'series_sub_category' => 'required',
                'seriesThumbnail' => 'required',
                'series_year' => 'required',
                'series_language' => 'required',
                'seriesFile' => 'required|mimes:mp4,mov,ogg,avi,wmv,m3u8,ts,mov,qt',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->first());
            } elseif (File::where('file_hash_key', md5($request->seriesFile))->count() > 0) {
                return response()->json('File already exist');
            }


            // Uploading File

            $SeriesStore = $request->seriesFile->store('main-files/series/' . $request->file_name, 'public');
            $SeriesThumbnialStore = $request->seriesThumbnail->store('main-files/series/' . $request->file_name, 'public');

            // Series Duration

            $getID3 = new \getID3;
            $getFile = $getID3->analyze($request->seriesFile);
            $duration = date('H:i:s.v', $getFile['playtime_seconds']);

            // Upload File Data to DB

            $File = File::create([
                'file_name' => $request->file_name,
                'file_path' => 'main-files/series/' . $request->file_name . '/',
                'file_category' => '2',
                'file_hash_key' => md5($request->seriesFile),
                'username_uploaded' => auth::user()->user_name
            ]);

            // Upload Series Data To DB

            $Series = Series::create([
                'file_id' => $File->id,
                'file_uploaded_name' => $request->seriesFile->getClientOriginalName(),
                'file_name' => $request->seriesFile->hashName(),
                'series_size' => $request->seriesFile->getSize(),
                'series_quality' => $request->series_quality,
                'series_sub_category' => $request->series_sub_category,
                'series_thumbnail' => $request->seriesThumbnail->hashName(),
                'series_year' => $request->series_year,
                'series_duration' => $duration,
                'series_language' => $request->series_language,
            ]);


            return response()->json('');

        }
        elseif ($fileType == "anime") {
            // Validate File
            $validator = Validator::make($request->all(), [
                'file_name' => 'required|unique:downloads_infos',
                'anime_quality' => 'required',
                'anime_sub_category' => 'required',
                'animeThumbnail' => 'required',
                'anime_year' => 'required',
                'anime_language' => 'required',
                'animeFile' => 'required|mimes:mp4,mov,ogg,avi,wmv,m3u8,ts,mov,qt',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->first());
            } elseif (File::where('file_hash_key', md5($request->animeFile))->count() > 0) {
                return response()->json('File already exist');
            }


            // Uploading File

            $AnimeStore = $request->animeFile->store('main-files/anime/' . $request->file_name, 'public');
            $AnimeThumbnialStore = $request->animeThumbnail->store('main-files/anime/' . $request->file_name, 'public');

            // Anime Duration

            $getID3 = new \getID3;
            $getFile = $getID3->analyze($request->animeFile);
            $duration = date('H:i:s.v', $getFile['playtime_seconds']);

            // Upload File Data to DB

            $File = File::create([
                'file_name' => $request->file_name,
                'file_path' => 'main-files/anime/' . $request->file_name . '/',
                'file_category' => '4',
                'file_hash_key' => md5($request->animeFile),
                'username_uploaded' => auth::user()->user_name
            ]);

            // Upload Anime Data To DB

            $Anime = Anime::create([
                'file_id' => $File->id,
                'file_uploaded_name' => $request->animeFile->getClientOriginalName(),
                'file_name' => $request->animeFile->hashName(),
                'anime_size' => $request->animeFile->getSize(),
                'anime_quality' => $request->anime_quality,
                'anime_sub_category' => $request->anime_sub_category,
                'anime_thumbnail' => $request->animeThumbnail->hashName(),
                'anime_year' => $request->anime_year,
                'anime_duration' => $duration,
                'anime_language' => $request->anime_language,
            ]);


            return response()->json('');


        }
        elseif ($fileType == "music") {
            // Validate File
            $validator = Validator::make($request->all(), [
                'file_name' => 'required|unique:downloads_infos',
                'music_sub_category' => 'required',
                'music_album' => 'required',
                'music_singer' => 'required',
                'musicThumbnail' => 'required',
                'music_year' => 'required',
                'music_language' => 'required',
                'musicFile' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->first());
            } elseif (File::where('file_hash_key', md5($request->musicFile))->count() > 0) {
                return response()->json('File already exist');
            }


            // Uploading File

            $MusicStore = $request->musicFile->store('main-files/music/' . $request->file_name, 'public');
            $MusicThumbnialStore = $request->musicThumbnail->store('main-files/music/' . $request->file_name, 'public');

            // music Duration

            $getID3 = new \getID3;
            $getFile = $getID3->analyze($request->musicFile);
            $duration = date('H:i:s.v', $getFile['playtime_seconds']);

            // Upload File Data to DB

            $File = File::create([
                'file_name' => $request->file_name,
                'file_path' => 'main-files/music/' . $request->file_name . '/',
                'file_category' => '3',
                'file_hash_key' => md5($request->musicFile),
                'username_uploaded' => auth::user()->user_name
            ]);

            // Upload Movie Data To DB

            $Music = Music::create([
                'file_id' => $File->id,
                'file_uploaded_name' => $request->musicFile->getClientOriginalName(),
                'file_name' => $request->musicFile->hashName(),
                'music_size' => $request->musicFile->getSize(),
                'music_sub_category' => $request->music_sub_category,
                'music_album' => $request->music_album,
                'music_singer' => $request->music_singer,
                'music_thumbnail' => $request->musicThumbnail->hashName(),
                'music_year' => $request->music_year,
                'music_duration' => $duration,
                'music_language' => $request->music_language,
            ]);


            return response()->json('');

        }
        elseif ($fileType == "program") {
            // Validate File
            $validator = Validator::make($request->all(), [
                'file_name' => 'required|unique:downloads_infos',
                'program_version' => 'required',
                'program_year' => 'required',
                'program_sub_category' => 'required',
                'programThumbnail' => 'required',
                'programFile' => 'required|mimes:zip,rar',
            ]);


            if ($validator->fails()) {
                return response()->json($validator->errors()->first());
            } elseif (File::where('file_hash_key', md5($request->programFile))->count() > 0) {
                return response()->json('File already exist');
            }


            // Uploading File

            $ProgramStore = $request->programFile->store('main-files/program/' . $request->file_name, 'public');
            $ProgramThumbnialStore = $request->programThumbnail->store('main-files/program/' . $request->file_name, 'public');

            // Upload File Data to DB

            $File = File::create([
                'file_name' => $request->file_name,
                'file_path' => 'main-files/game/' . $request->file_name . '/',
                'file_category' => '6',
                'file_hash_key' => md5($request->programFile),
                'username_uploaded' => auth::user()->user_name
            ]);

            // Upload Movie Data To DB
            $Program = Program::create([
                'file_id' => $File->id,
                'file_uploaded_name' => $request->programFile->getClientOriginalName(),
                'file_name' => $request->programFile->hashName(),
                'program_size' => $request->programFile->getSize(),
                'program_sub_category' => $request->program_sub_category,
                'program_version' => $request->program_version,
                'program_thumbnail' => $request->programThumbnail->hashName(),
                'program_year' => $request->program_year,
                'program_language' => $request->program_language,
            ]);

            return response()->json('');
        }
        elseif ($fileType == "game") {
            // Validate File
            $validator = Validator::make($request->all(), [
                'file_name' => 'required|unique:downloads_infos',
                'game_version' => 'required',
                'game_year' => 'required',
                'game_sub_category' => 'required',
                'gameThumbnail' => 'required',
                'gameFile' => 'required|mimes:zip,rar',
            ]);


            if ($validator->fails()) {
                return response()->json($validator->errors()->first());
            } elseif (File::where('file_hash_key', md5($request->gameFile))->count() > 0) {
                return response()->json('File already exist');
            }


            // Uploading File

            $GameStore = $request->gameFile->store('main-files/game/' . $request->file_name, 'public');
            $GameThumbnialStore = $request->gameThumbnail->store('main-files/game/' . $request->file_name, 'public');

            // Upload File Data to DB

            $File = File::create([
                'file_name' => $request->file_name,
                'file_path' => 'main-files/game/' . $request->file_name . '/',
                'file_category' => '5',
                'file_hash_key' => md5($request->gameFile),
                'username_uploaded' => auth::user()->user_name
            ]);

            // Upload Movie Data To DB
            $Game = Game::create([
                'file_id' => $File->id,
                'file_uploaded_name' => $request->gameFile->getClientOriginalName(),
                'file_name' => $request->gameFile->hashName(),
                'game_size' => $request->gameFile->getSize(),
                'game_sub_category' => $request->game_sub_category,
                'game_version' => $request->game_version,
                'game_thumbnail' => $request->gameThumbnail->hashName(),
                'game_year' => $request->game_year,
                'game_language' => $request->game_language,
            ]);

            return response()->json('');
        }
        else {
            return response()->json('Invalid File!');
        }
    }


}
