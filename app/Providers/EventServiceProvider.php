<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
       protected $listen = [
           // User Events
           'App\Events\UserWasRegistered' => [
               'App\Listeners\UserRegistrationEmail',
           ],
           'App\Events\UserProfileWasCreated' => [
               'App\Listeners\UserProfileCreation',
           ],
           'App\Events\PetWasCreated' => [
               'App\Listeners\PetCreation'
           ],
           'App\Events\PostWasMade' => [
               'App\Listeners\PostCreation'
           ]
       ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
