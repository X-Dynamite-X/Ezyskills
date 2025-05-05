<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
class UpdateCourseNotification extends Notification  implements ShouldQueue

{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    // بيانات تُحفظ في جدول notifications
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
}
