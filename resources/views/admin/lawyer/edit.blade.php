@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Lawyers</h5>
                    <span>Edit Lawyers</span>
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
	<div class="card-header"><h3>Edit Lawyer</h3></div>
	<div class="card-body">

        	{!! Form::model($user,array('route'=>['lawyer.update',($user->id)],
                'id'=>'lawyer.store', 
                'files' => true, 
                'class'=>'forms-sample',
                'method' => 'PUT'
                )) !!}    
			@include('admin.lawyer._form')
              <button type="submit" class="btn btn-primary mr-2">Update</button>
                <button class="btn btn-light">Cancel</button>


				</form>
			</div>
		</div>
	</div>
</div>

@section('pageCss')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .blog-details__content {
        border:none !important;
    }
</style>
@stop

@section('pageJs')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#case_type').select2();
</script>

@stop


@endsection
