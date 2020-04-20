<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'downloads_infos';

    protected $fillable=['file_name','file_path','file_category','file_hash_key','username_uploaded'];

    public function movie(){
        return $this->belongsToMany('App\Movie','movies_infos','file_id','id');
    }
    public function series(){
        return $this->belongsToMany('App\Series','series_infos','file_id');
    }
    public function music(){
        return $this->belongsToMany('App\Music','musics_infos','file_id');
    }
    public function game(){
        return $this->belongsToMany('App\Game','games_infos','file_id');
    }
    public function program(){
        return $this->belongsToMany('App\Program','programs_infos','file_id');
    }
    public function anime(){
        return $this->belongsToMany('App\Anime','anime_infos','file_id');
    }
}
