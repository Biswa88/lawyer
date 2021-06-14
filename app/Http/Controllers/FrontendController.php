<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Mail\AppointmentMail;


class FrontendController extends Controller
{
    public function index()
    {
    	date_default_timezone_set('Asia/Kolkata');
       if(request('date')){
           
       
            $lawyers = $this->findLawyersBasedOnDate(request('date'));
            return view('welcome',compact('lawyers'));
       }
       
        $lawyers = Appointment::where('date',date('Y-m-d'))->get();
        
    	return view('welcome',compact('lawyers'));
        
       }
       public function show($lawyerId,$date)
       {
           $appointment = Appointment::where('user_id',$lawyerId)->where('date',$date)->first();
           $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
           
           $user = User::where('id',$lawyerId)->first();
           $lawyer_id = $lawyerId;
   
           return view('appointment',compact('times','date','user','lawyer_id'));
       }
       public function findLawyersBasedOnDate($date)
       {
           $lawyers = Appointment::where('date',$date)->get();
           return $lawyers;
   
       }

   public function store(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $request->validate(['time'=>'required']);
        $check = $this->checkBookingTimeInterval();
        if($check){
            return redirect()->back()->with('errmessage','You have already booked an appointment.Please wait to make next appointment');
        }

        Booking::create([
            'user_id'=> auth()->user()->id,
            'lawyer_id'=> $request->lawyerId,
            'time'=> $request->time,
            'date'=> $request->date,
            'status'=>0
        ]);
        Time::where('appointment_id',$request->appointmentId)
        ->where('time',$request->time)
        ->update(['status'=>1]);
        //send email notification
        $lawyerName = User::where('id',$request->lawyerId)->first();
        $mailData = [
            'name'=>auth()->user()->name,
            'time'=>$request->time,
            'date'=>$request->date,
            'lawyerName' => $lawyerName->name

        ];
        try{
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
        }catch(\Exception $e){

        }

        return redirect()->back()->with('message','Your appointment was booked');
    }
    public function checkBookingTimeInterval()
    {
        return Booking::orderby('id','desc')
            ->where('user_id',auth()->user()->id)
            ->whereDate('created_at',date('Y-m-d'))
            ->exists();
    }
    public function myBookings()
    {
        $appointments = Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('booking.index',compact('appointments'));
    }
}