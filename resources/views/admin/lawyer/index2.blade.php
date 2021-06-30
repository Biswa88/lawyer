


  


  


  @extends('admin.layouts.master')
  @section('content')
  <div class="card">
      <div class="card-header">
           @if(Session::has('message'))
          <div class="alert bg-success alert-success text-white" role="alert">
              {{Session::get('message')}}
          </div>
      @endif 
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Client Name</th>
            <th>Image</th>
            <th>Email</th>
            
            <th>Address</th>
           
            <th>Gender</th>
            <th>Phone No</th>
            <th>About</th>
            <th>Action</th>

           
            
           
          </tr>
          </thead>
          <tbody>
              
          
              @foreach($users as $user)
              <tr>
                  <td>{{$user->name}}</td>
                  <td><img src="{{asset('profile')}}/{{$user->image}}" class="table-user-thumb" alt=""></td> 
                  <td>{{$user->email}}</td>
                  
                  <td>{{$user->address}}</td>
                 
                   
                   <td>{{$user->gender}}</td>
                   <td>{{$user->phone}}</td>
                   <td>{{$user->description}}</td>
                  
                   
                  <td>
                      <div class="table-actions">
                          <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}"class="btn btn-info">View
                          
                          </a>
                          
  
                      </div>
                  </td>
  
              </tr>
     
              <!-- View Modal -->
                 @include('admin.lawyer.modal1')
  
  
  
              @endforeach
            
             
               
          
           
          </tbody>
          <tfoot>
             
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
     