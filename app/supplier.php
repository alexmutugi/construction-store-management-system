<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class supplier extends Model
{
    //
    use softDeletes;

    public function tool_detail()
    {
        return $this->hasMany('App\tool_detail');
    }
    public function material_category()
    {
        return $this->hasMany('App\material_category');
    }
    public function material_detail()
    {
        return $this->hasMany('App\material_detail');
    }
}
