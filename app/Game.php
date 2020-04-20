<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games_infos';

    protected $fillable=['file_id','file_name','file_uploaded_name','game_size','game_sub_category','game_thumbnail','game_year','game_version'];

    public function file(){
        return $this->hasMany('App\File','id','file_id');
    }
}
