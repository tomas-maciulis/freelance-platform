<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $timestamps = False;

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
