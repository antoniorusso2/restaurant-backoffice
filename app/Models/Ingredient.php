<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasModelRoutes;

class Ingredient extends Model
{
    use HasModelRoutes;

    protected $hidden = ['pivot', 'quantity']; //nasconde la tabella pivot per la response api

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
