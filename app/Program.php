<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    protected $table = 'programs_infos';

    protected $fillable=['file_id','file_name','file_uploaded_name','program_size','program_sub_category','program_thumbnail','program_year','program_version'];

    public function file(){
        return $this->hasMany('App\File','id','file_id');
    }
}
