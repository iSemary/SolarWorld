<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function show_as($value){
        if(strtolower($value) == 'movies'){
            $types = 'App\Movie';
            $categoryNum = '1';
        }elseif(strtolower($value) == 'series'){
            $types = 'App\Series';
            $categoryNum = '2';
        }elseif (strtolower($value) == 'music') {
            $types = 'App\Music';
            $categoryNum = '3';
        }elseif (strtolower($value) == 'anime') {
            $types = 'App\Anime';
            $categoryNum = '4';
        }elseif (strtolower($value) == 'games') {
            $types = 'App\Game';
            $categoryNum = '5';
        }elseif (strtolower($value) == 'programs') {
            $types = 'App\Program';
            $categoryNum = '6';
        }elseif (strtolower($value) == 'others') {
            $types = 'App\Other';
            $categoryNum = '7';
        }else {
            return view('welcome');
        }
        return view('welcome', ['value' => strtolower($value), 'types'=>$types,'categories'=>'App\Category','categoryNum'=>$categoryNum]);

    }
    public function show_with_name($value,$name){
        if(strtolower($value) == 'movies'){
            $types = 'App\Movie';
            $categoryNum = '1';
        }elseif(strtolower($value) == 'series'){
            $types = 'App\Series';
            $categoryNum = '2';
        }elseif (strtolower($value) == 'music') {
            $types = 'App\Music';
            $categoryNum = '3';
        }elseif (strtolower($value) == 'anime') {
            $types = 'App\Anime';
            $categoryNum = '4';
        }elseif (strtolower($value) == 'games') {
            $types = 'App\Game';
            $categoryNum = '5';
        }elseif (strtolower($value) == 'programs') {
            $types = 'App\Program';
            $categoryNum = '6';
        }elseif (strtolower($value) == 'others') {
            $types = 'App\Other';
            $categoryNum = '7';
        }else {
            return view('welcome');
        }
        return view('type', ['value' => strtolower($value), 'types'=>$types,'categories'=>'App\Category','categoryNum'=>$categoryNum]);
    }
}
