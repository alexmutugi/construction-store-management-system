<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tools_allocation extends Model
{
    //
    use SoftDeletes;

    public function employee()
    {
        return $this->belongsTo('App\employee');
    }
    public function user_id()
    {
        return $this->belongsTo('App\User');
    }
    public function asset_category()
    {
        return $this->belongsTo('App\tool_category');
    }
    public function tool()
    {
        return $this->belongsTo('App\tool');
    }
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
