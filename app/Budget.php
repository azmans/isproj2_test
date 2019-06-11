<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';

    protected $primaryKey = 'id';

    public function soon_to_weds_budget()
    {
        return $this->belongsTo('App\User');
    }
}
