<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    
    public function createPaymentIntent(Booking $booking)
    {
        
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            
            $paymentIntent = PaymentIntent::create([
                'amount' => $booking->event->ticket_price * 100, 
                'currency' => 'usd',
                'metadata' => ['booking_id' => $booking->id], 
            ]);

    
            $payment = Payment::create([
                'booking_id' => $booking->id,
                'user_id' => auth()->id(),
                'amount' => $booking->event->ticket_price,
                'payment_status' => 'pending', 
                'payment_method' => 'Stripe',
            ]);

            return view('payment.create', [
                'clientSecret' => $paymentIntent->client_secret,
                'booking' => $booking,
            ]);
        } catch (\Exception $e) {

            return back()->with('error', 'Unable to process payment: ' . $e->getMessage());
        }
    }


    public function paymentSuccess(Request $request)
    {

        $payment = Payment::where('booking_id', $request->booking_id)->first();

        if ($payment) {

            $payment->update([
                'payment_status' => 'completed',
                'transaction_id' => $request->input('transaction_id'),
            ]);


            $booking = Booking::find($request->booking_id);
            if ($booking) {
                $booking->update(['payment_status' => 'Paid']);
            }


            return view('payment.success', compact('booking'));
        } else {
            return redirect()->route('home')->with('error', 'Payment not found.');
        }
    }


    public function paymentFailure(Request $request)
    {

        $payment = Payment::where('booking_id', $request->booking_id)->first();

        if ($payment) {

            $payment->update(['payment_status' => 'failed']);
        }


        return view('payment.failure');
    }
}
