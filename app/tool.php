<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tool extends Model
{
    //
    use softDeletes;
//
//
//    public function supplier()
//    {
//      return $this->belongsTo('App\supplier');
//    }
    public function tool_category()
    {
      return $this->belongsTo('App\tool_category');
    }
    public function user()
    {
      return $this->belongsTo('App\user');
    }
    public function tools_allocation()
    {
      return $this->hasMany('App\tools_allocation');
    }
    public function tool_detail()
    {
      return $this->hasMany('App\tool_detail');
    }
}
