<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
class EnrollUserInCourseNotification  extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    // يتم حفظ الإشعار في قاعدة البيانات
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    // حفظ البيانات في جدول notifications
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => $this->message,
        ]);
    }

    public function broadcastType()
    {
        return 'trainer_event';
    }
}
