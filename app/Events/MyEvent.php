<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $courseName; 

    /**
     * Create a new event instance.
     *
     * @param string $courseName
     */
    public function __construct($courseName)
    {
        $this->courseName = $courseName;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
      
        return new Channel('courses');
    }

 
    public function broadcastAs()
    {
        return 'course-added';
    }
}
