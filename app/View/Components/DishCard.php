<?php

namespace App\View\Components;

use App\Models\Dish;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DishCard extends Component
{
    public Dish $dish;
    /**
     * Create a new component instance.
     */
    public function __construct(Dish $dish)
    {
        $this->dish = $dish;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dish-card');
    }
}
