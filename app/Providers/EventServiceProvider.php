<?php

namespace App\Providers;

use App\Events\BatcheCreated;
use App\Events\BatcheDeleted;
use App\Events\BatcheUpdated;
use App\Listeners\SendEventDeletedNotification;
use App\Listeners\SendEventNotification;
use App\Listeners\SendEventUpdatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BatcheCreated::class => [
            SendEventNotification::class,
        ],
        BatcheUpdated::class => [
            SendEventUpdatedNotification::class,
        ],
        BatcheDeleted::class => [
            SendEventDeletedNotification::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
