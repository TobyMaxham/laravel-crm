<?php

namespace App\View\Components\Layouts\Navigation;

use Illuminate\View\Component;

class NavItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public array $navItem, public int|string $index)
    {
    }

    public function isActive($item): bool
    {
        if (! isset($item['submenu'])) {
            return str_contains(request()->url(), $this->getLink($item));
        }

        $active = false;
        foreach ($item['submenu'] as $subItem) {
            if (str_contains(request()->url(), $this->getLink($subItem))) {
                $active = true;
                break;
            }
        }

        return $active;
    }

    public function getLink($item): string
    {
        return isset($item['route']) ? route($item['route']) : url($item['url'] ?? '#');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (!isset($this->navItem['submenu']) || !is_array($this->navItem['submenu'])) {
            return view('themes.portal5.layouts.navigation.nav-item');
        }

        return view('themes.portal5.layouts.navigation.nav-sub-item');
    }
}
