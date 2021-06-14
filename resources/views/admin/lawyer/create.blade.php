@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Lawyers</h5>
                    <span>Add Lawyers</span>
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
                <li class="breadcrumb-item active" aria-current="page">Create</li>
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
	<div class="card-header"><h3>Add Lawyer</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('lawyer.store')}}" method="post" enctype="multipart/form-data" >@csrf
			<div class="row">
				<div class="col-lg-6">
					<label for="">Lawyer name</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="enter name" value="                   {{old('name')}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
				<div class="col-lg-6">
					<label for="">BCR</label>
					<input type="bcr" name="bcr" class="form-control @error('bcr') is-invalid @enderror" placeholder="bcr"value="                   {{old('bcr')}}">
                     @error('bcr')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<label for="">Email</label>
					<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="                   {{old('email')}}">
                     @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
				
                



                <div class="col-lg-6">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password"value="                   {{old('password')}}">
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
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="address" value="                   {{old('address')}}">
                         @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label>Role</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">Please select role</option>
                            @foreach(App\Models\Role::where('name','!=','client')->get() as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
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
                        <div class="col-lg-6">
                            <label for="">Phone No</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="phone" value="                   {{old('phone')}}">
                             @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="col-md-6">
                            
                            <label for="">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                <option value="">select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                             @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>  
        
        
        
                        </div>
                    
                    
                        
                <div class="row">
                    <div class="col-lg-6">
                            <label>Image</label>
                            
                                <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                                <span class="input-group-append">
                               {{--  <button class="file-upload-browse btn btn-primary" type="button">Browse Photo</button>  --}}
                                </span>
                                 @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                            </div>
                       

                             <div class="col-lg-6">
                                <label for="">Case_deal</label>
                        <select name="case_deal" class="form-control">
                            <option value="">Please select</option>

                            @foreach(App\Models\Case_deal::all() as $d)
                                <option value="{{$d->case_deal}}">{{$d->case_deal}}</option>
                            @endforeach
                        </select>


                         @error('case_deal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        


                        
            
           
            <div class="form-group">
                <label for="exampleTextarea1">About</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4" name="description">
                {{old('description')}}

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
