@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> 

                     Appointments ({{$all_bookings->count()}})
                 </div>
             

                

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Amount Paid</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Gender</th>

                          <th scope="col">Time</th>
                          {{--  <th scope="col">Lawyer</th>  --}}
                        
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($all_bookings as $key=>$booking)
                        @if($booking->user)
                        <tr>
                          <th scope="row">{{$key}}</th>
                           <td>
                               @if($booking->user->image)
                              <img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%;">
                                @else
                                <img src="{{  asset('assets/images/default_avatar.png') }}" width="80" style="border-radius: 50%;">
                               
                                @endif 
                                
                            </td> 
                          <td>{{$booking->date}}</td>
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->user->email}}</td>
                          <?php 
                            $amount_paid = 0;

                            if(DB::table('payments')->where('booking_id', $booking->id)->count()) {
                                if(DB::table('payments')->where('booking_id', $booking->id)->first()->payment_status == 'Success') {
                                    $amount_paid = DB::table('payments')->where('booking_id', $booking->id)->first()->amount_paid;
                                }else{
                                    $amount_paid = 0;
                                }
                                
                            }
                            
                          ?>
                          <td>{{ $amount_paid }}</td>
                          <td>{{$booking->user->phone}}</td>
                          <td>{{$booking->user->gender}}</td>
                          <td>{{$booking->time}}</td>
                          {{--  <td>{{$booking->lawyer->name}}</td>  --}}
                          <td>
                            @if($booking->status==0)
                            <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-primary"> Pending</button></a>
                            @else 
                             <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-success"> Cheked</button></a>
                            @endif
                        </td>
                          
                        </tr>
                        @endif
                        @empty
                        <td>There is no any appointments !</td>
                        @endforelse
                       
                      </tbody>
                    </table>

                </div>
                 {{$all_bookings->links()}}  
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
