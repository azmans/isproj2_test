<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';

    public function soon_to_weds_guest()
    {
        return $this->belongsTo('App\User');
    }
}
