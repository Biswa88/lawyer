@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/file.png" class="img-fluid" style="border:2px solid rgb(73, 5, 5);">
        </div>
        <div class="col-md-6">
        <h2>Create an Account and Book your Appointment</h2>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae voluptates ex, qui nesciunt voluptate ipsa, maxime consequatur nobis odit expedita explicabo cumque facere voluptatum quam quod ipsam! Architecto, iure labore.</p>
        <div class="mt-5">
           <a href="{{url('/register')}}"> <button class="btn btn-success">Register as Client</button></a>
            <a href="{{url('/login')}}"><button class="btn btn-primary">Login</button></a>

        </div>
</div>
</div>
<hr>
<!--search lawyer-->
<form action="" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-header">Search Lawyers</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        
                    </div>
                    <div class="col-md-4">
                        
                   <a href="" >Search Lawyers</a>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    </form>








<!--search lawyer-->
<form action="" method="GET">
<div class="card">
    <div class="card-body">
        <div class="card-header">Find Lawyers</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="date" class="form-control" id="datepicker">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary" type="submit">Find Lawyers</button>

                </div>

            </div>

        </div>

    </div>

</div>
</form>
<!--display lawyer-->
<div class="card">
    <div class="card-body">
        <div class="card-header"> Lawyers</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Expertise</th>
                        <th>Book</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lawyers as $lawyer)
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="{{asset('images')}}/{{ $lawyer->lawyer->image }}" width="100px" style="border-radius: 50%;">
                        </td>
                        <td>
                            {{ $lawyer->lawyer->name }}
                        </td>
                        <td>
                            {{ $lawyer->lawyer->case_deal }}
                        </td>
                        <td>
                           <a href="{{ route('create.appointment',[$lawyer->user_id,$lawyer->date])}}"> <button class="btn btn-success">Book Appointment</button></a>
                        </td>
                    </tr>
                    @empty
                    <td>No Lawyers Available Today</td>
                    @endforelse
                </tbody>

            </table>
            

        </div>

    </div>

</div>

</div>
@endsection
