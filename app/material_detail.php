<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class material_detail extends Model
{
    //
    use SoftDeletes;

    public function material_category()
    {
        return $this->belongsTo('App\material_category');
    }
    public function supplier()
    {
        return $this->belongsTo('App\supplier');
    }
    public function material()
    {
        return $this->belongsTo('App\material');
    }
}
