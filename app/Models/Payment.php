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

    

    public function payments()
    {
    
        return $this->hasMany(Payment::class);
    }
}
