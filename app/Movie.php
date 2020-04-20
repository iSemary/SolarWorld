<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies_infos';

    protected $fillable=['file_id','file_name','file_uploaded_name','movie_size','movie_quality','movie_sub_category','movie_thumbnail','movie_year','movie_duration','movie_language'];

    public function file(){
        return $this->hasMany('App\File','id','file_id');
    }

}
