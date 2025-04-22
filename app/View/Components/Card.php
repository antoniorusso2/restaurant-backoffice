<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Ingredient;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Card extends Component
{

    public Model $item;
    public string $route;

    /**
     * Create a new component instance.
     */
    public function __construct(Model $item, string $route)
    {
        $this->item = $item;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
