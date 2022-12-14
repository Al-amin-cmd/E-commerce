<?php

namespace App\Providers;

use App\View\Composers\FrontendComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
   

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.partials.frontend.header', FrontendComposer::class);
    }
}
