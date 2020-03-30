<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    Protected $table = 'teachers';
    protected $fillable = ['name','subject','image'];
}

