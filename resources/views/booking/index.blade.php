@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your appointments({{$appointments->count()}})</div>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Lawyer</th>
                          <th scope="col">Time</th>
                          <th scope="col">Date for</th>
                          <th scope="col">Created date</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($appointments as $key=>$appointment)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$appointment->lawyer->name}}</td>
                          <td>{{$appointment->time}}</td>
                          <td>{{$appointment->date}}</td>
                          <td>{{$appointment->created_at}}</td>
                          <td>
                              @if($appointment->status==0)
                                <button class="btn btn-primary">Not visited</button>
                                @else 
                                <button class="btn btn-success"> Cheked</button>
                                <?php 
                                    $check_var = DB::table('ratings')
                                                  ->where('user_id', Auth::user()->id)
                                                  ->where('booking_id', $appointment->id);
                                      
                                ?>
                                @if(!$check_var->count())
                                <button class="btn btn-danger" id="open_modal" onclick="openModal({{ $appointment->lawyer_id }}, {{ $appointment->id }})">Update Case Status</button>
                                
                                @else
                                <?php
                                    $rating = $check_var->select('rating')->first()->rating;
                                ?>
    <p>
                                <i>You have rated {{  $rating }} star </i></p>
                                @endif
                              @endif
                          </td>
                        </tr>
                        @empty
                        <td>You have no any appointments</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate your lawyer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::label('Select Case Completetion Status','',array('class'=>'')) !!}

          <input type="hidden" id="lawyer_id" />
          <input type="hidden" id="booking_id" />
          <?php 
              $completion_status = [];

              $completion_status[1] = 'Yes';
              $completion_status[0] = 'Not Completed';
          ?>
          {!! Form::select('completion_status', $completion_status, null,['class'=>'form-control',
          'id'=>'completion_status',
          'placeholder'=>'Case Completetion Status','autocomplete'=>'off',
          'required'=>'true']) !!}


            {!! Form::label('Rate your lawyer','',array('class'=>'', 'style' =>  "margin-top: 4%")) !!}

              <div class="row">
                <div class="col-md-12">
            <span class="fa fa-star checked lrate"></span>
            <span class="fa fa-star checked lrate"></span>
            <span class="fa fa-star checked lrate"></span>
            <span class="fa fa-star lrate"></span>
            <span class="fa fa-star lrate"></span>
              </div></div>

              <input type="hidden" name="rating" id="lawyer_rating" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submit_rating" class="btn btn-primary">Submit Rating</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section('pageJs')
<script>
  $rating = 3;
  $('#lawyer_rating').val($rating);
  openModal = function(lawyer_id, booking_id) {
    //console.log(lawyer_id)
    //console.log(booking_id)
    $('#lawyer_id').val(lawyer_id)
    $('#booking_id').val(booking_id)
    $('#ratingModal').modal('show');
  }

  $('.lrate').click(function() {

    if($(this).hasClass('checked')) {
      $(this).removeClass('checked');
      $rating--
      //console.log($rating)
    }else{
      $(this).addClass('checked');
      $rating++
    }
    
    $('#lawyer_rating').val($rating);
  });

  



  $('#submit_rating').click(function() {

    $lawyer_id = $('#lawyer_id').val();
    $booking_id = $('#booking_id').val();
    $rating = $('#lawyer_rating').val();
    $completion_status = $('#completion_status').val();
    if($lawyer_id == '') {
      alert('Lawyer not selected');
      return false;
    }else if($completion_status == '') {
      alert('Seelct completion status');
      return false;
    }else if($booking_id == '') {
      alert('Booking not selected');
      return false;
    }else if($rating <= 0) {
      alert('Please rate your lawer');
      return false;
    }else{

      data = '';
      url = '';
      data += '&lawyer_id='+$lawyer_id+'&booking_id='+$booking_id+'&rating='+$rating+'&completion_status='+$completion_status;
      url += "{{ route('submit_lawyer_rating') }}" 
      //console.log(data+url)
      $.ajax({
        data : data, 
        method : 'GET', 
        url : url,

        error : function(resp) {
          console.log(resp);
          alert('Something went wrong !')
        },
        success : function(resp) {
          //console.log(resp);
          if(resp.error == 1) {
            alert(resp.msg);
            return false;
          }else{
            alert(resp.msg);
            window.location.href = "{{ route('my.booking') }}";
          }
          
        }     
      });



    }


  });
</script>
@stop

@section('pageCss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .checked {
  color: orange;
}
</style>
@stop