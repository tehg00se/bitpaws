<?php

namespace App\Listeners;

use Log;
use App\Events\PostWasMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreation
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
    public function handle(PostWasMade $post)
    {

        Log::info('User added a post : ' . json_encode(['post' => $post]));

    }
}
