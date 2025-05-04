<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnrollUserInCourseNotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $trainerId;

    public function __construct($message, $trainerId)
    {
        $this->message = $message;
        $this->trainerId = $trainerId;
    }

    public function broadcastOn()
    {

       
        return new PrivateChannel('trainer_channel_' . $this->trainerId);
    }

    public function broadcastAs()
    {
        return 'trainer_event';
    }
}
