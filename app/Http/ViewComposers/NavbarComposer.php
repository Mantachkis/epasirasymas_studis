<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class NavbarComposer
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user()->name;
    }

    public function compose(View $view)
    {
        $view->with('name', $this->user);
    }
}
