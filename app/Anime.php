<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $table = 'anime_infos';

    protected $fillable=['file_id','file_name','file_uploaded_name','anime_season','anime_size','anime_quality','anime_sub_category','anime_thumbnail','anime_year','anime_duration','anime_language'];

    public function file(){
        return $this->hasMany('App\File','id','file_id');
    }
}
