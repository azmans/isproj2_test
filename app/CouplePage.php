<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouplePage extends Model
{
    protected $table = 'couple_pages';

    public function soon_to_wed_couple_pages()
    {
        return $this->belongsTo('App\User');
    }
}
