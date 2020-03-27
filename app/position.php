<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    protected $table = 'position';
    protected $fillable = ['position'];

    public function official()
    {
        return $this->hasOne('App\Official');
    }
}
