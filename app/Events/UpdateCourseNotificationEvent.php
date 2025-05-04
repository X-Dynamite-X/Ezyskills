<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateCourseNotificationEvent  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public $courseId;

    public function __construct($message, $courseId)
    {
        $this->message = $message;
        $this->courseId = $courseId;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('course_channel_' . $this->courseId);
    }

    public function broadcastAs()
    {
        return 'course_event';
    }
}