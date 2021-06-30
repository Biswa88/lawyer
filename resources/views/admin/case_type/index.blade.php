


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
            <th>SI NO</th>
            <th>Case_type</th>
            
            <th>Action</th>
            
           
          </tr>
          </thead>
          <tbody>
              
             
              @foreach($case_types as $key=>$case_type)
              <tr>
                <td>{{$key+1}}</td>
                  

                  <td>{{$case_type->case_type}}</td>
                  
                  
                   
                  <td>
                      <div class="table-actions">
                          {{--  <a href="#" data-toggle="modal" data-target="#exampleModal{{$case_deal->id}}"class="btn btn-info">View
                          
                          </a>  --}}
                          <a href="{{route('case_type.edit',[$case_type->id])}}" class="btn btn-primary">Update</a>
                          
                           <a href="{{route('case_type.show',[$case_type->id])}}" class="btn btn-warning">Delete </a>   
                             {{--   <form action="{{route('case_deal.edit',[$case_deal->id])}}" method="post">@csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form> --}} 
                      
                          
  
                      </div>
                  </td>
  
              </tr>
     
             
  
  
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
     