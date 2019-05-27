<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    //
    use SoftDeletes;

    public function tool_allocation()
    {
        return $this->hasMany('App\tool_allocation');
    }

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
