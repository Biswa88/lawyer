 @extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <span>Add District</span>
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
	<div class="card-header"><h3>Add District</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('district.store')}}" method="post">@csrf
			<div class="row">

				<div class="col-lg-6">
				
                        {!! Form::label('State_id','',array('class'=>'')) !!}
                        {!! Form::select('state_id', $states, null,['class'=>'form-control','id'=>'state_id','placeholder'=>'select state_id','autocomplete'=>'off','required'=>'true']) !!}
                        
                        {!! $errors->first('state_id','<span class="help-inline">:message</span>') !!}
				</div>
                <div class="col-lg-6">
				
                        {!! Form::label('District name','',array('class'=>'')) !!}
                        {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'name','autocomplete'=>'off','required'=>'true']) !!}
                        
                        {!! $errors->first('name','<span class="help-inline">:message</span>') !!}
				</div>
            </div>
        
            
                <div class="col-lg-6">
                    <button class="btn btn-success"> SUBMIT </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
        </form>
    

  

    @stop
     

     
