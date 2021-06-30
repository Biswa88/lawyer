<div class="col-lg-6">
    {!! Form::label('State_id','',array('class'=>'')) !!}
    {!! Form::text('state_id',null,['class'=>'form-control','id'=>'state_id','placeholder'=>'state_id','autocomplete'=>'off','required'=>'true']) !!}
    {!! $errors->first('state_id','<span class="help-inline">:message</span>') !!}
</div>



<div class="row">
    <div class="col-lg-6">
       {!! Form::label('District Name','',array('class'=>'')) !!}
       {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'District name','autocomplete'=>'off','required'=>'true']) !!}
       
       {!! $errors->first('name','<span class="help-inline">:message</span>') !!}
    </div>

   
    
