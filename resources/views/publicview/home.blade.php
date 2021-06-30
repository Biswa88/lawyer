@extends('layouts.default')

@section('main_content')

<section class="banner-one" style="background-image: url('assets/images/backgrounds/home_banner.jpg');">
    <div class="container">
        
            {!! Form::open(array('route'=>['public.search.lawyer'],
            'id'=>'public.search.lawyer',
            'class' => 'tour-search-one', 
            'method' => 'GET',
            )) !!}
            <div class="tour-search-one__inner">
                <div class="tour-search-one__inputs">
                    <div class="tour-search-one__input-box bx1">
                        <label for="place">Lawyer name</label>
                        <input type="text" placeholder="Enter keywords" name="q" id="q">
                    </div><!-- /.tour-search-one__input-box -->


                    <div class="tour-search-one__input-box bx1">
                        <label for="place">Case Type</label>
                        {!! Form::select('case_type', $case_types, null,['class' => 'form-control',   'id'=>'case_type','placeholder'=>'Select Case Type','autocomplete'=>'off']) !!}
            
                    </div><!-- /.tour-search-one__input-box -->
                    
                    <div class="tour-search-one__input-box bx1">
                                    <label for="place">Consultancy Fees</label>
                                    <input type="number" placeholder="Consultancy Fees" name="cfes" id="cfes">
                                </div>

                             
                    <div class="tour-search-one__input-box bx2">
                        <label for="type" class="control-label">District</label>
                        {!! Form::select('district_id', $districts, null,['id'=>'district_id', 
                        'class' => 'form-control',
                        'placeholder'=>'Select District','autocomplete'=>'off']) !!}
                        </select>
                    </div><!-- /.tour-search-one__input-box -->
                </div><!-- /.tour-search-one__inputs -->
                <div class="tour-search-one__btn-wrap">
                    <button type="submit" class="thm-btn tour-search-one__btn">Find now</button>
                </div><!-- /.tour-search-one__btn-wrap -->
            </div><!-- /.tour-search-one__inner -->
        </form><!-- /.tour-search-one -->
    </div><!-- /.container -->
</section><!-- /.banner-one -->

{{-- <section class="features-one__title">
    <div class="container">
        <div class="block-title text-center">
            <p></p>
            <h3></h3>
        </div><!-- /.block-title -->
    </div><!-- /.container -->
</section><!-- /.features-one__title --> --}}



<section class="tour-one">
    <div class="container">
        <div class="block-title text-center">
            <p>Top Rated</p>
            <h2>Lawyers</h2>
        </div><!-- /.block-title -->
        <div class="row">
            @foreach($top_rates_lawyers as $k => $v)
            <div class="col-xl-4 col-lg-6">
                <div class="tour-one__single">
                    <div class="tour-one__image">
                        @if($v->image)
                        <img src="{{  asset($v->image) }}" width="150" height="200" alt="">
                        @else
                        <img src="{{  asset('images/default_avatar.png') }}" alt="">
                        @endif
                      
                    </div><!-- /.tour-one__image -->
                    <div class="tour-one__content">
                        <div class="tour-one__stars">
                            @if($v->rating)
                            <i class="fa fa-star"></i> {{ $v->rating }} Star
                            @else
                            Not Yet Rated
                            @endif
                        </div><!-- /.tour-one__stars -->
                        <h3><a target="_blank" href="{{ route('public.search.lawyer', ['lawyer_id' => $v->id]) }}">{{  ucwords($v->name) }}</a></h3>
                        <p>Consultancy Fees <span> {{ $v->consultancy_fees }} </span> </p>
                        @if(count($v->case_types))
                        <ul class="tour-one__meta list-unstyled">
                            <li>
                                @foreach($v->case_types as $casetype)
                                &nbsp; <span class="case_types_lawyer"> {{ strtoupper($casetype->caseType->case_type) }} </span>
                                @endforeach
                            </li>
                            
                        </ul><!-- /.tour-one__meta --> 
                        @endif
                        <a href="{{  route('public.search.lawyer', ['district_id' => $v->district->id]) }}"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ strtoupper($v->district->name) }}</a>
                    </div><!-- /.tour-one__content -->
                </div><!-- /.tour-one__single -->
            </div><!-- /.col-lg-4 -->
            @endforeach

        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.tour-one -->







@stop

@section('pageCss')
<style>
    .case_types_lawyer { padding: 4px; border-radius: 2px; background: #BA4A00; color: #FFFFFF; font-size: 0.80em;}
</style>
@stop