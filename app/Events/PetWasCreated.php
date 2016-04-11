<?php

namespace App\Events;

use App\Models\Animals\Pet;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class PetWasCreated extends Event
{
    use SerializesModels;

    public $pet;

    /**
     * UserWasRegistered constructor.
     * @param User $user
     */
    public function __construct(Pet $pet)
    {
        $this->pet = $pet;
    }
}