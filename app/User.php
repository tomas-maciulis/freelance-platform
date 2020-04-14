<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender_id',
        'birth_date',
        'phone_number',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ads() {
        return $this->hasMany('App\Ad');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function privateMessages() {
        return $this->hasMany('App\PrivateMessage');
    }

    public function rememberedAds() {
        return $this->belongsToMany('App\Ad', 'remembered_ads')->withTimestamps();
    }

    public function gender() {
        return $this->belongsTo('App\Gender');
    }

    public function userType() {
        return $this->belongsTo('App\UserType');
    }
}
