<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    public function ad() {
        return $this->belongsTo('App\Ad');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
