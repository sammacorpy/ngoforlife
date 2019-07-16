<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userprofile extends Model
{
    //
    public function name()
    {
        return $this->hasOne('App\usersdata');
    }
}
