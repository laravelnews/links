<?php

namespace App\Events;

use App\Events\Event;
use App\Links;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LinkWasSubmitted extends Event
{
    use SerializesModels;

    /**
     * @var Links
     */
    public $link;

    /**
     * Create a new event instance.
     *
     */
    public function __construct(Links $link)
    {
        $this->link = $link;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
