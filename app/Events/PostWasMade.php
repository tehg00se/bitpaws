<?php

namespace App\Events;

use App\Models\Posts\Post;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class PostWasMade extends Event
{
    use SerializesModels;

    public $post;

    /**
     * UserWasRegistered constructor.
     * @param User $user
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}