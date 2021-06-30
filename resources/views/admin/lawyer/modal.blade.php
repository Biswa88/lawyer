<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lawyer information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><img src="{{asset( $user->image ) }}" class="table-user-thumb" alt="" width="200"></p>
           <p class="badge badge-pill badge-dark">Role:{{$user->role->name}}</p>
          
          <p>Name:{{$user->name}}</p>
          <p>Email:{{$user->email}}</p>
          <p>BCR:{{$user->bcr}}</p>
          <p>Address:{{$user->address}}</p>
          <p>Case_deal:
            @foreach ($user->case_types as $casetype)
                    {{ $casetype->caseType->case_type }} , 
                  @endforeach
          </p>
          <p>Consultancy Fees:{{$user->consultancy_fees}}</p>
          <p>District:{{$user->district_id}}</p>
          <p>Gender:{{$user->gender}}</p>
          <p>Phone:{{$user->phone}}</p>
          <p>About:{{$user->description}}</p>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
  </div>
