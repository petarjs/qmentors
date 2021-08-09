<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyState extends Component
{
    public string $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon = 'folder-add')
    {
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.empty-state');
    }
}
