@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
           

            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Lawyers</h5>
                    <span>Appoinment time</span>
                    
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">Lawyer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="container">
         @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
                
            </div>
                
        @endforeach
    
        
    <form action="{{route('appointment.store')}}" method="post">@csrf
 
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Date picker</h3>
              </div>
              <div class="card-body">
               
               
                  
                 <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"  data-target="#reservationdate" name="date"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker"> 
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </div>
            
              
        

    <div class="card">
        <div class="card-header">
            Choose AM time
           <span style="margin-left: 700px">Check/Uncheck
               <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked" >
           </span>
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
             
               
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><input type="checkbox" name="time[]"  value="8am">8am</td>
                  <td><input type="checkbox" name="time[]"  value="8.45am">8.45am</td>
                  <td><input type="checkbox" name="time[]"  value="9.30am">9.30am</td>
                </tr>
                 <tr>
                  <th scope="row">2</th>
                  <td><input type="checkbox" name="time[]"  value="10.15am">10.15am</td>
                  <td><input type="checkbox" name="time[]"  value="11am">11am</td>
                
                </tr>
                

               

               

                
            
            
              </tbody>
            </table>
        </div>
    </div>

        <div class="card">
        <div class="card-header">
            Choose PM time
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
             
               
              <tbody>
                <tr>
                  <th scope="row">3</th>
                  <td><input type="checkbox" name="time[]"  value="12pm">12pm</td>
                  <td><input type="checkbox" name="time[]"  value="12.45pm">12.45pm</td>
                  <td><input type="checkbox" name="time[]"  value="1.30pm">1.30pm</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td><input type="checkbox" name="time[]"  value="2.15pm">2.15pm</td>
                  <td><input type="checkbox" name="time[]"  value="3pm">3pm</td>
                  <td><input type="checkbox" name="time[]"  value="3.45pm">3.45pm</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td><input type="checkbox" name="time[]"  value="4.30pm">4.30pm</td>
                  
                </tr>
                
               
                  
               
                
                  
                
            
            
              </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
</div>


<style type="text/css">
    input[type="checkbox"]{
        zoom:1.1;
   
    }
    body{
        font-size: 18px;
    }
</style>



@endsection