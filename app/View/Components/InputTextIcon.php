<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextIcon extends Component
{
    public $name;
    public $label;
    public $iconStart;
    
    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $iconStart=null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->iconStart = $iconStart;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-text-icon');
    }
}
