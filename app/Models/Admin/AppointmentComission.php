<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class AppointmentComission extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'commission_pc',
        'paid_amount',
        'comission_amount',
    ];
    public static $rules = [
        'payment_id'        =>'required|exists:payments,id', 
        'commission_pc'     =>'required', 
        'paid_amount'       =>'required', 
        'comission_amount'  =>'required', 
    ];

    public function payment()
    {
  	    return $this->belongsTo(Appointment::class);
    }
}
