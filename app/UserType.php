<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public $timestamps = False;

    public function users() {
        return $this->hasMany('App\User');
    }
}
