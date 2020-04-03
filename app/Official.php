<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    protected $table = "officials";
    protected $fillable = ['name','position_id','image'];

    public function position()
    {
        return $this->belongsTo('App\Position');
    }
}
