<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $table = 'sub_categories';

    protected $fillable=['category_id','subcategory_name'];

    public function Category(){
        return $this->belongsTo('App\Category');
    }
}
