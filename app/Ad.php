<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $guarded = [];

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function bids() {
        return $this->hasMany('App\Bid');
    }

    public function category() {
        return $this->hasOne('App\WorkCategory');
    }

    public function remembered() {
        return $this->belongsToMany('App\User', 'remembered_ads')->withTimestamps();
    }

    public function messages() {
        return $this->hasMany('App\PrivateMessage');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
