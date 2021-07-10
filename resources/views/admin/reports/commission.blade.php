@extends('admin.layouts.master')
@section('content')
<div class="card">
   <div class="card-header">
      @if(Session::has('message'))
      <div class="alert bg-success alert-success text-white" role="alert">
         {{Session::get('message')}}
      </div>
      @endif 
      <h3 class="card-title">View all admin commissions</h3>
   </div>

  <div class="card-body"> 
    {!! Form::open(array('route'=>['reports.commission'],
    'id'=>'reports.commission', 
    'class'=>'contact-one__form',
    'method' => 'GET',
    )) !!}   
    <div class="row low-gutters">
          <div class="input-group">

            {!! Form::label('Lawyer','',array('class'=>'col-md-2')) !!}
            <div class="col-md-4">
              {!! Form::select('user_id', $lawyers, null,['class'=>'form-control','id'=>'user_id','placeholder'=>'Select Lawyer','autocomplete'=>'off','required'=>'true']) !!}
            </div>
      </div>
    </div>

    <br>
    <div class="row low-gutters">
      <div class="input-group">
        {!! Form::label('','',array('class'=>'col-md-2')) !!}
        <div class="col-md-4">
          <button type="submit" class="btn btn-success"> SEARCH</button>
        </div>
      </div>
    </div>

    {!! Form::close() !!}

</div>



   <!-- /.card-header -->
   <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
         <thead>
            <tr>
               <th>SI NO</th>
               <th>Lawer Name</th>
               <th>Appointment Booking and Time</th>
               <th>Paid Amount</th>
               <th>Commission Percentage(in %)</th>
               <th>Commission Amount</th>
               <th>Date of Payment</th>
            </tr>
         </thead>
         <tbody>
          <?php 
              $total_amount_paid  = 0;
              $total_commission   =  0;
            ?>  
          
          @foreach($results as $key=>$v)

          <?php 
                  
                  $payment_data = DB::table('payments')
                                ->join('users', 'users.id', '=', 'payments.user_id')
                                //->join('users', 'users.id', '=', 'payments.buyer_id')
                                ->join('bookings', 'bookings.id', '=', 'payments.booking_id')
                                ->where('payments.id', $v->payment_id);
                  if($lawyer_id != null) {
                    $payment_data = $payment_data->where('users.id', $lawyer_id);
                  }

                  if($payment_data->count()) {
                    $payment = $payment_data->first();

                    $total_amount_paid += $payment->amount_paid;
                    $total_commission += $v->comission_amount;
                  }

                  
              ?>  
            @if($payment_data->count())
            <tr>
               <td>{{$key+1}}</td>
               

              
                <td>{{$payment->name}}</td>
               <td>{{  $payment->date }} {{ $payment->time }}</td>
               <td>{{ $payment->amount_paid }}</td>
               <td>
                  {{$v->commission_pc }} %
               </td>

               <td>
                {{$v->comission_amount }}
              </td>

              <td>
                {{  date('d-m-Y h:i A', strtotime($payment->date_of_payment)) }}
              </td>
            </tr>
            @endif
            @endforeach
         </tbody>
         <tfoot>
           <thead>
             <tr>
               <th colspan="3">Total</th>
               <th> {{ $total_amount_paid }} </th>
               <th></th>
               <th>{{ $total_commission }}</th>
             </tr>
         </tfoot>
      </table>
   </div>
   <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection