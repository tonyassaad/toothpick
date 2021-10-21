<?php

namespace App\Providers;

use App\Events\AccountCreatedEvent;
use App\Events\EventBookingCreated;
use App\Events\WebAccountCreatedEvent;
use App\Listeners\AccountCreatedListener;
use App\Listeners\EventBookingCreatedListener;
use App\Listeners\UpdateEventOccupency;
use App\Listeners\WebUserAccountCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Stripe\Account;

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
        AccountCreatedEvent::class => [
            AccountCreatedListener::class,

        ],
        WebAccountCreatedEvent::class => [
            WebUserAccountCreatedListener::class,
        ],
        EventBookingCreated::class => [
            EventBookingCreatedListener::class,
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
