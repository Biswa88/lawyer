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
                
                    <h3>Client Registration</h3>
    
                </div>

                {!! Form::open(array('route'=>['public_view.save1'],
                    'id'=>'public_view.save1', 
                    'files' => true, 
                    'class'=>'contact-one__form'
                    )) !!}   
                    <div class="row low-gutters">
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('full_name','',array('class'=>'')) !!}
                                {!! Form::text('name',null,['class'=>'','id'=>'name','placeholder'=>'Client name','autocomplete'=>'off','required'=>'true']) !!}
       
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
                                {!! Form::label('phone','',array('class'=>'')) !!}
                                {!! Form::text('phone',null,['class'=>'form-control','id'=>'phone','placeholder'=>'phone','autocomplete'=>'off','required'=>'true']) !!}
                
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->


                        
                        <div class="col-md-6">
                            <div class="input-group">
                                {!! Form::label('role','',array('class'=>'')) !!}<br>
                                <div class="col-md-12">{!! Form::select('role_id', $roles, 1,['class'=>'form-control', 'disabled' => true, 'id'=>'role_id','placeholder'=>'Select Role','autocomplete'=>'off','required'=>'true']) !!}</div>
            
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-6 -->


                       



                        
                        


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

                        <div class="col-md-12">
                            <div class="input-group">
                                <button type="submit" class="thm-btn contact-one__btn">SUBMIT</button><!-- /.thm-btn contact-one__btn -->
                            </div><!-- /.input-group -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row low-gutters -->
                </form>
            </div><!-- /.col-lg-7 -->
        </div>
    </div>
</section>


@stop

@section('pageCss')
<style>
    .blog-details__content {
        border:none !important;
    }
</style>
@stop