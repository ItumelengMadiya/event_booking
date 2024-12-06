<?php

namespace App\Notifications;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewEventNotification extends Notification
{
    public function __construct(public Event $event)
    {
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'event_name' => $this->event->name,
            'event_id' => $this->event->id,
            'message' => 'A new event has been created.',
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new event has been created.')
            ->action('View Event', url(route('events.show', $this->event->id)));
    }
}

