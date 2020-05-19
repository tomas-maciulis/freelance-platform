<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrivateMessage extends Model
{
    use SoftDeletes;

    public function ad() {
        return $this->belongsTo('App\Ad');
    }

    public function sender() {
        return $this->belongsTo('App\User', 'sender_user_id');
    }

    public function recipient() {
        return $this->belongsTo('App\Ad', 'recipient_user_id');
    }
}
