


  


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
          <th>Lawyer Name</th>
          <th>Image</th>
          <th>Email</th>
          <th>BCR</th>
          <th>Address</th>
          <th>Case_Type</th>
          <th>Gender</th>
         
          
        
          <th>Action</th>
          

          
         
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
      

            <tr>
                <td>{{$user->name}}</td>
                {{--  <td><img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt=""></td>  --}}
                <td><img src="{{asset( $user->image )}}" class="table-user-thumb" alt=""></td>

                <td>{{$user->email}}</td>
                <td>{{$user->bcr}}</td>
                <td>{{$user->address}}</td>
               
                 <td>{{$user->case_type}}</td>
                 <td>{{$user->gender}}</td>
                
                 
                
                
                 
                <td>
                    <div class="table-actions">
                        <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}"class="btn btn-info">View
                        
                        </a>
                       

                    </div>
                 
                </td>

            </tr>
   
            <!-- View Modal -->
               @include('admin.lawyer.modal')


              
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
   