<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdCategory extends Model
{
    public $timestamps = False;

    public function ads() {
        return $this->belongsToMany('App\Ad');
    }
}
