@extends('admin.layouts.master')
@section('content')
<div class="page-header">
   <div class="row align-items-end">
      <div class="col-lg-8">
         <div class="page-header-title">
            <i class="ik ik-command bg-blue"></i>
            <div class="d-inline">
               <h5>Case_type</h5>
               <span>Add Case_type</span>
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="../index.html"><i class="ik ik-home"></i></a>
               </li>
               <li class="breadcrumb-item"><a href="#">Case_type</a></li>
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
         <div class="card-header">
            <h3>Add Case_type</h3>
         </div>
         <div class="card-body">
            <form class="forms-sample" action="{{route('case_type.store')}}" method="post" >
               @csrf  
               <div class="row">
                  <div class="col-lg-6">
                     {!! Form::label('Case','',array('class'=>'')) !!}
                     {!! Form::text('case_type',null,['class'=>'form-control','id'=>'case_type','placeholder'=>'case_type','autocomplete'=>'off','required'=>'true']) !!}
                     {!! $errors->first('case_type','<span class="help-inline">:message</span>') !!}
                  </div>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
               </div>
         </div>
      </div>
   </div>
</div>
</div>
</form>
@endsection