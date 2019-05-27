<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class current_material extends Model
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
    public function current_material()
    {
        return $this->hasMany('App\current_material');
    }
}
