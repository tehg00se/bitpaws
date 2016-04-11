<?php

namespace App\Listeners;

use Log;
use App\Events\PetWasCreated;
use App\Events\UserProfileWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PetCreation
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
    public function handle(PetWasCreated $event)
    {

        Log::info('User added a pet : ' . json_encode(['user' => $event]));

    }
}
