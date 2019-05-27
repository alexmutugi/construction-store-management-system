<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class material extends Model
{
    //
    use softDeletes;

    public function material_category()
    {
        return $this->belongsTo('App\material_category');
    }
    public function material_detail()
    {
        return $this->hasMany('App\material_detail');
    }
    public function material_usage()
    {
        return $this->hasMany('App\material_usage');
    }
    public function current_material()
    {
        return $this->hasMany('App\current_material');
    }
}
