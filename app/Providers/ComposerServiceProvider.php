<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    function boot(){
        View::composer(
            'layouts.main', 'App\Http\ViewComposers\NavbarComposer'
        );
    }
}