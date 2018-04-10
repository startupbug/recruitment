<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserProfile' => [
            'App\Listeners\CreateProfile',
        ],
        'App\Events\UserCompanyProfile' => [
            'App\Listeners\CreateCompanyProfile',
        ],
        'App\Events\TemplateSection' => [
            'App\Listeners\CreateTemplateSection',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
