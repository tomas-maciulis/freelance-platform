<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bid extends Model
{
    use SoftDeletes;

    protected $fillable = ['ad_id', 'cost', 'body'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function ad() {
        return $this->belongsTo('App\Ad');
    }
}
