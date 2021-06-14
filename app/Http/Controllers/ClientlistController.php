<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class ClientlistController extends Controller
{
    public function index(Request $request)
    {
         date_default_timezone_set('Asia/Kolkata');
    	if($request->date){
    		$bookings = Booking::latest()->where('date',$request->date)->get();
    		return view('admin.clientlist.index',compact('bookings'));
    	 }
    	 $bookings = Booking::latest()->where('date',date('Y-m-d'))->get();
    	 return view('admin.clientlist.index',compact('bookings'));
    }
	public function newStatus($id)
	{
		$booking  = Booking::find($id);
        $booking->status =! $booking->status;
        $booking->save();
        return redirect()->back();

	}
	public function allTimeAppointment()
    {
        $bookings = Booking::latest()->paginate(20);
        return view('admin.clientlist.index',compact('bookings'));
    }

}
