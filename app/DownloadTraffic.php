<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadTraffic extends Model
{
    protected $table = 'download_traffics';

    protected $fillable=['file_id','user_ip'];

}
