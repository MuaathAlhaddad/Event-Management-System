<?php

namespace App\Providers;

use App\Event;
use App\Observers\RecurrenceObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::observe(RecurrenceObserver::class);
        Blade::include('includes.user_modal_form', 'user_modal_form');
        Blade::include('includes.event_form', 'event_form'); 
        Blade::include('includes.card_style', 'card_style');
        Blade::include('includes.datatablescript', 'datatablescript'); 
    }
}
