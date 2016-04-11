<?php

namespace App\Events;

use App\Models\UserProfile;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class UserProfileWasCreated extends Event
{
    use SerializesModels;

    public $profile;

    /**
     * UserWasRegistered constructor.
     * @param User $user
     */
    public function __construct(UserProfile $profile)
    {
        $this->profile = $profile;
    }
}