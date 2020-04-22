<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Request;
use App\File;
use App\Game;
use App\Program;
use App\DownloadTraffic;

use Response;

class ViewController extends Controller {
    public function index() {
        return view('welcome',
            ['users' => 'App\User', 'files' => 'App\File', 'category' => 'App\Category', 'sub_category' => 'App\Sub_Category',
                'movies' => 'App\Movie', 'series' => 'App\Series', 'musics' => 'App\Music', 'anime' => 'App\Anime',
                'programs' => 'App\Program', 'games' => 'App\Game', 'others' => 'App\Other']);
    }

    public function show_as($value) {
        if (strtolower($value) == 'movies') {
            $types = 'App\Movie';
            $categoryNum = '1';
        } elseif (strtolower($value) == 'series') {
            $types = 'App\Series';
            $categoryNum = '2';
        } elseif (strtolower($value) == 'music') {
            $types = 'App\Music';
            $categoryNum = '3';
        } elseif (strtolower($value) == 'anime') {
            $types = 'App\Anime';
            $categoryNum = '4';
        } elseif (strtolower($value) == 'games') {
            $types = 'App\Game';
            $categoryNum = '5';
        } elseif (strtolower($value) == 'programs') {
            $types = 'App\Program';
            $categoryNum = '6';
        } elseif (strtolower($value) == 'others') {
            $types = 'App\Other';
            $categoryNum = '7';
        } else {
            return view('welcome');
        }
        return view('welcome', ['value' => strtolower($value),
            'file' => 'App\File',
            'types' => $types,
            'categories' => 'App\Category',
            'categoryNum' => $categoryNum]);

    }

    public function show_with_name($value, $name) {
        if (strtolower($value) == 'movies') {
            $types = 'App\Movie';
            $categoryNum = '1';
        } elseif (strtolower($value) == 'series') {
            $types = 'App\Series';
            $categoryNum = '2';
        } elseif (strtolower($value) == 'music') {
            $types = 'App\Music';
            $categoryNum = '3';
        } elseif (strtolower($value) == 'anime') {
            $types = 'App\Anime';
            $categoryNum = '4';
        } elseif (strtolower($value) == 'games') {
            $types = 'App\Game';
            $categoryNum = '5';
        } elseif (strtolower($value) == 'programs') {
            $types = 'App\Program';
            $categoryNum = '6';
        } elseif (strtolower($value) == 'others') {
            $types = 'App\Other';
            $categoryNum = '7';
        } else {
            return view('welcome');
        }

        return view('type', [
            'value' => strtolower($value),
            'file' => 'App\File',
            'types' => $types,
            'categories' => 'App\Category',
            'categoryNum' => $categoryNum,
            'filename' => $name
        ]);
    }

    public function download_file($file) {

        $GetFile = File::where('id', $file)->first();
        if ($GetFile) {

            if ($GetFile->file_category == '5') {

                $GetFileName = Game::where('file_id', $file)->first();

                $DownloadLog = DownloadTraffic::create([
                    'file_id'=>$GetFile->id,
                    'user_ip'=>Request::ip()
                ]);


                $Path = public_path() .'/storage/'. $GetFile->file_path . $GetFileName->file_name;
                $FileLocate = $GetFile->file_name . '_' . $GetFileName->game_version . '.zip';
                $headers = array('Content-Type: application/zip');

                return Response::download($Path, $FileLocate, $headers);



            } elseif ($GetFile->file_category == '6') {
                $GetFileName = Program::where('file_id', $file)->first();
                return Storage::download('public/' . $GetFile->file_path . $GetFileName->file_name,
                    $GetFile->file_name . '_' . $GetFileName->program_version . '.zip'
                );
            }

        } else {
            return view('welcome');
        }
    }
}
