<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class Solicitud extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $text,
        public Collection $solicitudes
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.solicitud');
    }
}
