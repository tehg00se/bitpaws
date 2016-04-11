<?php

namespace App\Listeners;

use Log;
use App\Events\UserProfileWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserProfileCreation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasRegistered  $event
     * @return void
     */
    public function handle(UserProfileWasCreated $event)
    {

        Log::info('New User Profile Created : ' . json_encode(['user' => $event]));

    }
}
