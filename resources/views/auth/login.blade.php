@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">

        @if(session('successMsg'))
        <div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" area-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="mdi mdi-check-all"></i>
            <strong>oh Snap!</strong>{{ session('successMsg') }}
        </div>
        @endif
       
        <div class="col-md-8">
            <div class="card">
                <section class="banner-one" style="background-image: url('assets/images/backgrounds/banner1.png');">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    <div style="text-align: center; margin-bottom: 30px;">
                    <img src="{{ asset('assets/images/law_logo.jpg')}}" width=300 height=180>
                </div>
                    <form class="loginform" method="POST" action="{{ route('post.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </section>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<style>
    .loginform label { color: #ffffff; font-weight: 700; }
</style>
@endsection

