<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class material_category extends Model
{
    //
    public function material()
    {
        return $this->hasMany('App\material');
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
