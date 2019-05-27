<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tool_detail extends Model
{
    //
    public function supplier()
    {
        return $this->belongsTo('App\supplier');
    }
    public function tool_category()
    {
        return $this->belongsTo('App\tool_category');
    }
    public function tool_allocation()
    {
        return $this->hasMany('App\tool_allocation');
    }

    public function tool()
    {
        return $this->belongsTo('App\tool');
    }

}
