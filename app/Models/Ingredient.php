<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $hidden = ['pivot', 'quantity']; //nasconde la tabella pivot per la response api

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
