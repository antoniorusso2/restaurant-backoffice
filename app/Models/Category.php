<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasModelRoutes;

class Category extends Model
{
    use HasModelRoutes;

    protected $hidden = ['created_at', 'updated_at'];

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
