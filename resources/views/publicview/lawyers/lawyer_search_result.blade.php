@extends('layouts.default')

@section('main_content')

<section class="contact-info-one">
    <h2 class="search-result">Search Resuts :</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                        @foreach($results as $k => $v)
                        <div class="blog-two__single blog-one__single">
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-md-3">
                                    <div class="blog-one__imagea">
                                        @if($v->image != NULL)
                                        <img src="{{ asset($v->image) }}" height="210" width="150" alt="">
                                        @else
                                        <img src="{{ asset('assets/images/default_avatar.png') }}" width="350" height="400" alt="">
                                        @endif
                                    </div><!-- /.blog-one__image -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-9 d-flex">
                                    <div class="blog-two__content my-auto">
                                        <ul class="list-unstyled blog-one__meta">
                                            <li>
                                                <i class="far fa-user-circle"></i> {{ $v->district->name }}</li>
                                            
                                            <li><i class="far fa-comments"></i>  BCR Number : {{$v->bcr}}</li>
                                            <li><i class="far fa-comments"></i>  Consultancy Fees : {{$v->consultancy_fees}}</li>
                                            <li><i class="fa fa-star lrate"></i>  Rating : {{ $v->rating }}</li>


                                        </ul><!-- /.list-unstyled blog-one__meta -->
                                        <h3>{{ $v->name }}</h3>
                                        <p> {{ $v->description }}</p>
                                         <div class="col-md-6">
                                        @if(count($v->case_types))
                                            <i class="fa fa-gavel" aria-hidden="true"></i>    
                                                @foreach($v->case_types as $casetype)
                                                
                                                &nbsp; <span class="case_types_lawyer"> {{ strtoupper($casetype->caseType->case_type) }} </span>
                                                @endforeach

                                        <br>
                                        @endif
                                        <hr>        
                                        @if(Auth::user() && Auth::user()->role_id == 1)
                                        <ul class="list-unstyled blog-one__meta">
                                            
                                           <li>  <i class="fa fa-phone-square" aria-hidden="true"></i> {{$v->phone }}</li>
                                           <li>  <i class="fa fa-envelope" aria-hidden="true"></i> {{$v->email}}</li>
                                        </ul>

                                        <hr>
                                        <form action="{{ route('create.appointment') }}" method="GET">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    SELECT DATE
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input id="datepicker" class="datepicker form-control" name="date">
                                                </div>

                                            <input type="hidden" name="lawyer_id" value="{{ $v->id }}">

                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-danger">
                                                        Book Appointment
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        @else
                                        <a href="{{ route('login') }}" class="blog-two__link"></a>
                                        <a href="{{ route('public_view.create') }}" class="blog-two__link">Sign In to view Contact Details</a>

                                        @endif

                                    </div><!-- /.blog-two__content -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </div><!-- /.blog-two__single -->
                        
                        @endforeach

                        

                        {{ $results->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.contact-info-one -->

@stop


@section('pageCss')

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.18/css/default/zebra_datepicker.min.css" integrity="sha512-CJyaLLygRDTA/3etUQWuiCKOrk0YGmYaJe+SWMtDv6QQT/rnRWkXcGWYn101NQQpVGwP2H6iHJucYFSi3tWXKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    h2.search-result {
        font-family: 'Noto Sans JP', sans-serif;
    }

    .case_types_lawyer { padding: 4px; border-radius: 2px; background: #BA4A00; color: #FFFFFF; font-size: 0.80em;}
</style>
@stop

