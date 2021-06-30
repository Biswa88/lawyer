<div class="row">
    <div class="col-lg-6">
       {!! Form::label('Lawyer Name','',array('class'=>'')) !!}
       {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder'=>'lawyer name','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('name','<span class="help-inline">:message</span>') !!}
    </div>
    <div class="col-lg-6">
       {!! Form::label('bcr','',array('class'=>'')) !!}
       {!! Form::text('bcr',null,['class'=>'form-control','id'=>'bcr','placeholder'=>'bcr','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('bcr','<span class="help-inline">:message</span>') !!}
    </div>
 </div>
 <div class="row">
    <div class="col-lg-6">
       {!! Form::label('email','',array('class'=>'')) !!}
       {!! Form::email('email',null,['class'=>'form-control','id'=>'email','placeholder'=>'email','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('email','<span class="help-inline">:message</span>') !!}
    </div>
    <div class="col-lg-6">
       {!! Form::label('Password','',array('class'=>'')) !!}
       {!! Form::password('password',null,['class'=>'form-control','id'=>'password','placeholder'=>'password','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('password','<span class="help-inline">:message</span>') !!}
    </div>
 </div>
 <div class="row">
    <div class="col-lg-6">
       {!! Form::label('address','',array('class'=>'')) !!}
       {!! Form::text('address',null,['class'=>'form-control','id'=>'address','placeholder'=>'address','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('address','<span class="help-inline">:message</span>') !!}
    </div>
    <div class="col-lg-6">
       {!! Form::label('Role','',array('class'=>'')) !!}
       {!! Form::select('role_id', $roles, null,['class'=>'form-control','id'=>'role_id','placeholder'=>'Select Role','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('role_id','<span class="help-inline">:message</span>') !!}
    </div>
 </div>
 <div class="row">
    <div class="col-lg-6">
       {!! Form::label('phone','',array('class'=>'')) !!}
       {!! Form::text('phone',null,['class'=>'form-control','id'=>'phone','placeholder'=>'phone','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('phone','<span class="help-inline">:message</span>') !!}
    </div>
    <div class="col-md-6">
       <?php 
          $genders = [];
          
          $genders['male'] = 'Male';
          $genders['female'] = 'Female';
          $genders['others'] = 'Others';
          
          ?>
       {!! Form::label('gender','',array('class'=>'')) !!}
       {!! Form::select('gender',$genders, null,['class'=>'form-control','id'=>'gender','placeholder'=>'Select Gender','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('gender','<span class="help-inline">:message</span>') !!}
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
       {!! Form::label('Case_type','',array('class'=>'')) !!}
       
       {!! Form::select('case_types[]', $case_types, $already_added_case_types,
        ['class'=>'col-md-12',
        'multiple' => 'multiple',
        'id'=>'case_type',
        'autocomplete'=>'off',
        'required'=>'true']) !!}

       {!! $errors->first('case_type','<span class="help-inline">:message</span>') !!}
    </div>
 </div>
 <div class="row">
    <div class="col-lg-6">
       {!! Form::label('District','',array('class'=>'')) !!}
       {!! Form::text('district_id',null,['class'=>'form-control','id'=>'district_id','placeholder'=>'district','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('district_id','<span class="help-inline">:message</span>') !!}
    </div>
    <div class="col-lg-6">
       {!! Form::label('Consultancy Fees','',array('class'=>'')) !!}
       {!! Form::text('consultancy_fees', null,['class'=>'form-control','id'=>'consultancy_fees','placeholder'=>'Consultancy Fees','autocomplete'=>'off','required'=>'true']) !!}
       {!! $errors->first('consultancy_fees','<span class="help-inline">:message</span>') !!}
    </div>
 </div>
 <div class="form-group">
    {!! Form::label('about','',array('class'=>'')) !!}
    {!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 4, 'id'=>'about','placeholder'=>'about','autocomplete'=>'off','required'=>'true']) !!}
    {!! $errors->first('description','<span class="help-inline">:message</span>') !!}
 </div>