<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tool_category extends Model
{
    //
    use SoftDeletes;


    public function tool_allocation()
    {
        return $this->hasMany('App\tool_allocation');
    }
    public function tool()
    {
        return $this->hasMany('App\tool');
    }
}
