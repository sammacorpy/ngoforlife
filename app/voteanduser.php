<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voteanduser extends Model
{
    //
    protected $primaryKey = 'voteid';

    public $timestamps = false;
    

    public $incrementing = false;
}
