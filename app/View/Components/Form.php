<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Form extends Component
{
    public Model $model; //dish, category o ingredient

    public array $fields; //campi input

    public string $method;
    public string $action;

    /**
     * Create a new component instance.
     */
    public function __construct(Model $model, string $method = 'POST', string $action = '#', array $fields = [])
    {
        $this->model = $model;
        $this->fields = $fields;
        $this->method = $method;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
