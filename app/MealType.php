<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
    protected $table = 'meal_types';

    public function soon_to_wed_meal_types()
    {
        return $this->belongsTo('App\User');
    }
}
