<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookingNotification extends Notification
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
            'message' => 'A new booking has been made for your event.',
            'booking_id' => $this->booking->id,
            'user_name' => $this->booking->user->name,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('A new booking has been made for your event.')
            ->action('View Booking', url(route('bookings.show', $this->booking->id)));
    }
}
