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
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="lawyer name" value="                   {{old('name')}}">
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
					<label for="">Address</label>
					<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="address" value="                   {{old('address')}}">>
                     @error('address')
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
                            @foreach(App\Role::where('name','!=','patient')->get() as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            
                        </select>
                         @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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