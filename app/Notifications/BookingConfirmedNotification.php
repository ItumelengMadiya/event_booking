<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingConfirmedNotification extends Notification
{
    public function __construct(public Booking $booking)
    {
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Your booking has been confirmed.',
            'event_name' => $this->booking->event->name,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your booking has been confirmed.')
            ->action('View Booking', url(route('bookings.show', $this->booking->id)));
    }
}

