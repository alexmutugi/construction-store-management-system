<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class material_usage extends Model
{
    //
    use SoftDeletes;

    public function material_category()
    {
        return $this->belongsTo('App\material_category');
    }
    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function material()
    {
        return $this->belongsTo('App\material');
    }

}
