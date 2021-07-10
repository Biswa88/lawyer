<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'user_id',
        'buyer_id',
		'date_of_payment',
		'amount_paid',
		'payment_request_id',
		'payment_status',
		'booking_id',
    ];
	
	public static $rules = [
        'user_id' 	=> 'required|exists:users,id',
        'buyer_id'	=> 'required|exists:users,id',
		'booking_id'	=> 'required|exists:bookings,id',
		'date_of_payment'	=> 'required|date|date_format:Y-m-d H:i:s',
		'amount_paid'	=> 'required|numeric',
		'payment_request_id'	=> 'required|unique:payemts,payment_request_id',
		'payment_status'	=> 'required',
    ];

	public function user()
    {
  	    return $this->belongsTo(App\Models\User::class);
    }

	public function buyer()
    {
  	    return $this->belongsTo(App\Models\User::class);
    }

	public function booking()
    {
  	    return $this->belongsTo(App\Models\Booking::class);
    }
}

