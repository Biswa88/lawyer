<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lawyer_id',
        'booking_id',
        'rating',
        'completion_status',
    ];

    public static $rules = [
        'user_id'   => 'required|exists:users,id',
        'lawyer_id' => 'required|exists:users,id',
        'booking_id'   => 'required|exists:bookings,id',
        'rating' => 'required|numeric|min:0',
        'completion_status' => 'required|numeric|in:0,1',
    ];
}
