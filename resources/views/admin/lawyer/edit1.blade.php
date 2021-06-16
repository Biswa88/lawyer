@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Lawyers</h5>
                    <span>Update Lawyers</span>
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
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
       
	<div class="card">
	<div class="card-header"><h3>Update Lawyer</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('lawyer.update',[$user->id])}}" method="post" enctype="multipart/form-data" >@csrf
            @method('PUT')
			<div class="row">
				<div class="col-lg-6">
					<label for="">Lawyer name</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder=" name" value="{{$user->name}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
				<div class="col-lg-6">
					<label for="">Email</label>
					<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{$user->email}}">
                     @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder=" password">
                     @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
                <div class="col-lg-6">
					<label for="">BCR</label>
					<input type="text" name="bcr" class="form-control @error('bcr') is-invalid @enderror" placeholder="bcr"  value="{{$user->bcr}}">
                     @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
			</div>

				<div class="row">
					<div class="col-lg-6">
						<label for="">Address</label>
						<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="address" value="{{$user->address}}">
                         @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					 <div class="col-lg-6">
                        <label for="">Case_Type</label>
                        <select name="case_type" class="form-control">
                          

                       



                            @foreach(App\Models\Case_type::all() as $case_type)
                            <option value="{{$case_type->case_type}}" @if($user->case_type==$case_type->case_type)selected @endif>{{$case_type->case_type}}</option> 
                            @endforeach


                         

                        </select>



                         @error('case_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div> 
			</div>

            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Specialist</label>
                        <select name="department" class="form-control">
                          

                       



                            @foreach(App\Department::all() as $department)
                            <option value="{{$department->department}}" @if($user->department==$department->department)selected @endif>{{$department->department}}</option> 
                            @endforeach


                         

                        </select>



                         @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                    </div>
                </div> --}}

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone number</label>
                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"value="{{$user->phone_number}}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                    </div> 
                </div>--}}

          
            <div class="row">
            	<div class="col-md-6">
                        <div class="form-group">
                    <label>Image</label>
                        <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                        <span class="input-group-append">
                       
                        </span>
                         @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                    <div class="col-md-6">
                        <label>Role</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">Please select role</option>
                            @foreach(App\Models\Role::where('name','!=','client')->get() as $role)
          <option value="{{$role->id}}"@if($user->role_id==$role->id)selected @endif>{{$role->name}}</option>
                            @endforeach
                            
                        </select>
                         @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
               
					<label for="">Gender</label>
					<select class="form-control @error('gender') is-invalid @enderror" name="gender">
                        @foreach(['male','female'] as $gender)
                        <option value="{{$gender}}" @if($user->gender==$gender)selected @endif>{{$gender}}</option>
                        @endforeach
					</select>
                     @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
			
                <div class="col-md-6">
                    <label for="">Phone number</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
            
            
           
            <div class="form-group">
                <label for="exampleTextarea1">About</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4" name="description">
                {{$user->description}}

                </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>


				</form>
			</div>
		</div>
	</div>
</div>


@endsection