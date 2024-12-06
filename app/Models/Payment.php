<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'amount',
        'payment_status',
        'payment_method',
        'transaction_id',
        'qr_code_path',
    ];

    // The duplicate payments() method should be removed.
    // Here is the correct version of the payments() method:

    public function payments()
    {
        // This defines a one-to-many relationship, meaning one booking can have many payments.
        return $this->hasMany(Payment::class);
    }
}
