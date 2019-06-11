<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    protected $table = 'budget_items';

    protected $primaryKey = 'id';

    public function soon_to_weds_item()
    {
        return $this->belongsTo('App\User');
    }
}
