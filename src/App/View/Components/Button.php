<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public ?string $class;
    public ?string $type;
    public string $as = 'button';
    public ?string $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $class = null, string $type = null, string $icon = null, string $as = null)
    {
        $this->class = $class;
        $this->type = $type;
        $this->icon = $icon;

        if ($as) {
            $this->as = $as;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
