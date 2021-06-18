{{-- @extends('admin.layouts.master')

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
		<form class="forms-sample" action="{{route('state.store')}}" method="post">@csrf
			<div class="row">

				<div class="col-lg-6">
					<label for="">State name</label>
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

    @stop --}}


    @extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>State</h5>
                    <span>Add State</span>
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../index.html"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">Add State</a></li>
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
	<div class="card-header"><h3>Add State</h3></div>
	<div class="card-body">
		  <form class="forms-sample" action="{{route('state.store')}}" method="post" >@csrf  
			<div class="row">
				<div class="col-lg-6">
                    <div class="form-group">

                        {{-- <label for="">State name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="enter name" value="{{old('name')}}">
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror--}}
                            {!! Form::label('State name','',array('class'=>'')) !!}
                        {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'name','autocomplete'=>'off','required'=>'true']) !!}
                        
                        {!! $errors->first('name','<span class="help-inline">:message</span>') !!}

				</div> 
           
            <div class="form-group">

				
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </div>
        </div>
           


				</form>
			</div>
            </div>
		</div>
	</div>
</div>


@endsection


