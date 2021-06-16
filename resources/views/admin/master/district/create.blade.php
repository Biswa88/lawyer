 @extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <span>Add State</span>
                </div>
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
	<div class="card-header"><h3>Add State</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('district.store')}}" method="post">@csrf
			<div class="row">

				<div class="col-lg-6">
					<label for="">State name</label>
					<select name="state_id" class="form-control">
                        <option value="-1">Select State</option>

                        @foreach ($state as $k => $v )
                            <option value="{{ $v->id }}">{{ $k }}{{  $v->name }}</option>
                        @endforeach
                    </select>
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
                <div class="col-lg-6">
					<label for="">District name</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="enter name" value="{{old('name')}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
            </div>
        
            <div class="row">
                <div class="col-lg-6">
                    <button class="btn btn-success"> SUBMIT </button>
                </div>
            </div>
 
        </form>
    </div>
</div>
</div>
  

    @stop
     

     
