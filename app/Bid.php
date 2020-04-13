<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function ad() {
        return $this->belongsTo('App\Ad');
    }
}
