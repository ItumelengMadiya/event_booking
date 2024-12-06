<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $availableSpots = $event->max_attendees - $event->bookings()->count();
        if ($availableSpots <= 0) {
            return redirect()->back()->with('error', 'Event is fully booked.');
        }

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'booking_date' => now(),
            'payment_status' => 'Pending',
        ]);

        return redirect()->route('payment.create', $booking);
    }

    public function history()
    {
        $bookings = auth()->user()->bookings()->with('event')->get();

        return view('user.bookings', compact('bookings'));
    }

    public function cancel(Request $request, Booking $booking)
    {
        if ($booking->payment_status === 'Paid') {
            // Process refund (Stripe or other payment gateway logic here)
        }

        $booking->delete();

        return redirect()->route('user.bookings')->with('success', 'Booking canceled successfully.');
    }
}
