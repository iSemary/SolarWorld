<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    protected $table = 'other_infos';

    protected $fillable=['file_id','file_size','file_description'];
}
