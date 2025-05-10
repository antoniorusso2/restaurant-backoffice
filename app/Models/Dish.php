<?php

namespace App\Models;

use App\Traits\HasModelRoutes;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasModelRoutes;

    protected $hidden = ['category_id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
