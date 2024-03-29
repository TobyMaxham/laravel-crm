<?php

namespace App\View\Components\Icons;

use Illuminate\View\Component;

class BiIcon extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $icon)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('themes.portal5.icons.bi-'.$this->icon);
    }
}
