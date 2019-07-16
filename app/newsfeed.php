<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newsfeed extends Model
{
    protected $primaryKey = 'newsfeed_id';
    const CREATED_AT = 'nf_created_at';
    const UPDATED_AT = 'nf_updated_at';
}
