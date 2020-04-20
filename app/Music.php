<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics_infos';

    protected $fillable=['file_id','file_name','file_uploaded_name','music_size','music_sub_category','music_thumbnail','music_year','music_album','music_singer','music_duration','music_language'];

    public function file(){
        return $this->hasMany('App\File','id','file_id');
    }
}
