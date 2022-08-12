<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserNotificationList extends Component
{
    private $unreadNotifications;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->unreadNotifications = auth()->user()->unreadNotifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('themes.portal5.layouts.notifications', [
            'unreadNotifications' => $this->unreadNotifications,
        ]);
    }
}
