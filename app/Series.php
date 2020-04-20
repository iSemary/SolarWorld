<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series_infos';

    protected $fillable=['file_id','file_name','file_uploaded_name','series_season','series_size','series_quality','series_sub_category','series_thumbnail','series_year','series_duration','series_language'];

    public function file(){
        return $this->hasMany('App\File','id','file_id');
    }
}
