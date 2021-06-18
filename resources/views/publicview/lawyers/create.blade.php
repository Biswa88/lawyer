@extends('layouts.default')

@section('main_content')


<section class="contact-one">
    <div class="container">
        <div class="row">
            @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
            
            <div class="col-lg-12">  
                
                <div class="blog-details__content">
                
                    <h3>Lawyer Registration</h3>
    
                </div>

                {!! Form::open(array('route'=>['public_view.save'],
                    'id'=>'public_view.save', 
                    'files' => true, 
                    'class'=>'contact-one__form'
                    )) !!}   
                    <div class="row low-gutters">
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('full_name','',array('class'=>'')) !!}
                                {!! Form::text('name',null,['class'=>'','id'=>'name','placeholder'=>'lawyer name','autocomplete'=>'off','required'=>'true']) !!}
       
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('BCR','',array('class'=>'')) !!}
                                {!! Form::text('bcr',null,['class'=>'form-control','id'=>'bcr','placeholder'=>'bcr','autocomplete'=>'off','required'=>'true']) !!}
        
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->
                        
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('password','',array('class'=>'')) !!}
                                {!! Form::password('password',null,['class'=>'form-control','id'=>'password','placeholder'=>'password','autocomplete'=>'off','required'=>'true']) !!}
        
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->


                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('confirm_password','',array('class'=>'')) !!}
                                {!! Form::password('password_confirmation',null,['class'=>'form-control','id'=>'password','placeholder'=>'Confirm password','autocomplete'=>'off','required'=>'true']) !!}
        
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('email','',array('class'=>'')) !!}
                                {!! Form::email('email',null,['class'=>'form-control','id'=>'email','placeholder'=>'email','autocomplete'=>'off','required'=>'true']) !!}
        
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->
                        

                        
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('role','',array('class'=>'')) !!}<br>
                                <div class="col-md-12">{!! Form::select('role_id', $roles, null,['class'=>'form-control','id'=>'role_id','placeholder'=>'Select Role','autocomplete'=>'off','required'=>'true']) !!}</div>
            
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->


                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('phone','',array('class'=>'')) !!}
                                {!! Form::text('phone',null,['class'=>'form-control','id'=>'phone','placeholder'=>'phone','autocomplete'=>'off','required'=>'true']) !!}
                
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->



                        
                        <div class="col-md-12">
                            <div class="input-group">
                                {!! Form::label('address','',array('class'=>'')) !!}
                                {!! Form::text('address',null,['class'=>'form-control','id'=>'address','placeholder'=>'address','autocomplete'=>'off','required'=>'true']) !!}
            
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-12 -->


                        <div class="col-md-6">
                            <div class="input-group">
                                <?php 
                                    $genders = [];

                                    $genders['male'] = 'Male';
                                    $genders['female'] = 'Female';
                                    $genders['others'] = 'Others';

                                ?>

                                {!! Form::label('gender','',array('class'=>'')) !!}
                                
                                <div class="col-md-12">
                                
                                    {!! Form::select('gender',$genders, null,['class'=>'form-control','id'=>'gender','placeholder'=>'Select Gender','autocomplete'=>'off','required'=>'true']) !!}
                                </div>
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->


                        <div class="col-md-6">
                            <div class="input-group">
                                <label>Image</label>
                
                                    <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                    
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="input-group">
                                {!! Form::label('Case_type','',array('class'=>'')) !!}
                                <div class="col-md-12">
                                     {!! Form::select('case_type', $case_types, null,['class'=>'form-control','id'=>'case_type','placeholder'=>'select case_type','autocomplete'=>'off','required'=>'true']) !!}
                                </div>
                                {!! $errors->first('case_type','<span class="help-inline">:message</span>') !!}
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-12 -->


                        <div class="col-md-12">
                            <div class="input-group">
                                {!! Form::label('about','',array('class'=>'')) !!}
                                {!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 4, 'id'=>'description','placeholder'=>'about','autocomplete'=>'off','required'=>'true']) !!}
                                
                                {!! $errors->first('description','<span class="help-inline">:message</span>') !!}
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-12 -->
                        



                        <div class="col-md-12">
                            <div class="input-group">
                                <button type="submit" class="thm-btn contact-one__btn">Send message</button><!-- /.thm-btn contact-one__btn -->
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row low-gutters -->
                </form>
            </div><!-- /.col-lg-7 -->
        </div>
    </div>
</section>


@stop
