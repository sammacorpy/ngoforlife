<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $primaryKey = 'comment_id';
    public $incrementing = false;
}
