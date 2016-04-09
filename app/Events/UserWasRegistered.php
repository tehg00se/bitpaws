<?php

namespace App\Events;

use App\Models\User;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class UserWasRegistered extends Event
{
    use SerializesModels;

    public $user;

    /**
     * UserWasRegistered constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}