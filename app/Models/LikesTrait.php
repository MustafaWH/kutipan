<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

trait LikesTrait
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes(){
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function is_liked(){
        return $this->likes()->where('user_id', Auth::user()->id)->count();
    }

    public function isOwner(){
        if(Auth::guest())
            return false;
        return Auth::user()->id == $this->user_id;
    }
}
