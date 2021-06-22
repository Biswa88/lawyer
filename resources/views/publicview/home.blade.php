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

<section class="features-one__title">
    <div class="container">
        <div class="block-title text-center">
            <p></p>
            <h3></h3>
        </div><!-- /.block-title -->
    </div><!-- /.container -->
</section><!-- /.features-one__title -->



<section class="tour-one">
    <div class="container">
        <div class="block-title text-center">
            <p>Featured tours</p>
            <h3>Most Popular Tours</h3>
        </div><!-- /.block-title -->
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="tour-one__single">
                    <div class="tour-one__image">
                        <img src="'assets/images/tour/tour-1-1.jpg" alt="">
                        <a href="tour-details.html"><i class="fa fa-heart"></i></a>
                    </div><!-- /.tour-one__image -->
                    <div class="tour-one__content">
                        <div class="tour-one__stars">
                            <i class="fa fa-star"></i> 8.0 Superb
                        </div><!-- /.tour-one__stars -->
                        <h3><a href="tour-details.html">National Park 2 Days Tour</a></h3>
                        <p><span>$1870</span> / Per Person</p>
                        <ul class="tour-one__meta list-unstyled">
                            <li><a href="tour-details.html"><i class="far fa-clock"></i> 3 Days</a></li>
                            <li><a href="tour-details.html"><i class="far fa-user-circle"></i> 12+</a></li>
                            <li><a href="tour-details.html"><i class="far fa-map"></i> Los Angeles</a></li>
                        </ul><!-- /.tour-one__meta -->
                    </div><!-- /.tour-one__content -->
                </div><!-- /.tour-one__single -->
            </div><!-- /.col-lg-4 -->
            <div class="col-xl-4 col-lg-6">
                <div class="tour-one__single">
                    <div class="tour-one__image">
                        <img src="'assets/images/tour/tour-1-2.jpg" alt="">
                        <a href="tour-details.html"><i class="fa fa-heart"></i></a>
                    </div><!-- /.tour-one__image -->
                    <div class="tour-one__content">
                        <div class="tour-one__stars">
                            <i class="fa fa-star"></i> 8.0 Superb
                        </div><!-- /.tour-one__stars -->
                        <h3><a href="tour-details.html">The Dark Forest Adventure</a></h3>
                        <p><span>$2600</span> / Per Person</p>
                        <ul class="tour-one__meta list-unstyled">
                            <li><a href="tour-details.html"><i class="far fa-clock"></i> 3 Days</a></li>
                            <li><a href="tour-details.html"><i class="far fa-user-circle"></i> 12+</a></li>
                            <li><a href="tour-details.html"><i class="far fa-map"></i> Los Angeles</a></li>
                        </ul><!-- /.tour-one__meta -->
                    </div><!-- /.tour-one__content -->
                </div><!-- /.tour-one__single -->
            </div><!-- /.col-lg-4 -->
            <div class="col-xl-4 col-lg-6">
                <div class="tour-one__single">
                    <div class="tour-one__image">
                        <img src="'assets/images/tour/tour-1-3.jpg" alt="">
                        <a href="tour-details.html"><i class="fa fa-heart"></i></a>
                    </div><!-- /.tour-one__image -->
                    <div class="tour-one__content">
                        <div class="tour-one__stars">
                            <i class="fa fa-star"></i> 7.0 Superb
                        </div><!-- /.tour-one__stars -->
                        <h3><a href="tour-details.html">Discover Depth of Beach</a></h3>
                        <p><span>$1399</span> / Per Person</p>
                        <ul class="tour-one__meta list-unstyled">
                            <li><a href="tour-details.html"><i class="far fa-clock"></i> 3 Days</a></li>
                            <li><a href="tour-details.html"><i class="far fa-user-circle"></i> 12+</a></li>
                            <li><a href="tour-details.html"><i class="far fa-map"></i> Los Angeles</a></li>
                        </ul><!-- /.tour-one__meta -->
                    </div><!-- /.tour-one__content -->
                </div><!-- /.tour-one__single -->
            </div><!-- /.col-lg-4 -->
            <div class="col-xl-4 col-lg-6">
                <div class="tour-one__single">
                    <div class="tour-one__image">
                        <img src="'assets/images/tour/tour-1-4.jpg" alt="">
                        <a href="tour-details.html"><i class="fa fa-heart"></i></a>
                    </div><!-- /.tour-one__image -->
                    <div class="tour-one__content">
                        <div class="tour-one__stars">
                            <i class="fa fa-star"></i> 8.8 Superb
                        </div><!-- /.tour-one__stars -->
                        <h3><a href="tour-details.html">Moscow Red City Land</a></h3>
                        <p><span>$1870</span> / Per Person</p>
                        <ul class="tour-one__meta list-unstyled">
                            <li><a href="tour-details.html"><i class="far fa-clock"></i> 3 Days</a></li>
                            <li><a href="tour-details.html"><i class="far fa-user-circle"></i> 12+</a></li>
                            <li><a href="tour-details.html"><i class="far fa-map"></i> Los Angeles</a></li>
                        </ul><!-- /.tour-one__meta -->
                    </div><!-- /.tour-one__content -->
                </div><!-- /.tour-one__single -->
            </div><!-- /.col-lg-4 -->
            <div class="col-xl-4 col-lg-6">
                <div class="tour-one__single">
                    <div class="tour-one__image">
                        <img src="'assets/images/tour/tour-1-5.jpg" alt="">
                        <a href="tour-details.html"><i class="fa fa-heart"></i></a>
                    </div><!-- /.tour-one__image -->
                    <div class="tour-one__content">
                        <div class="tour-one__stars">
                            <i class="fa fa-star"></i> 8.0 Superb
                        </div><!-- /.tour-one__stars -->
                        <h3><a href="tour-details.html">Magic of Italy Tours</a></h3>
                        <p><span>$1478</span> / Per Person</p>
                        <ul class="tour-one__meta list-unstyled">
                            <li><a href="tour-details.html"><i class="far fa-clock"></i> 3 Days</a></li>
                            <li><a href="tour-details.html"><i class="far fa-user-circle"></i> 12+</a></li>
                            <li><a href="tour-details.html"><i class="far fa-map"></i> Los Angeles</a></li>
                        </ul><!-- /.tour-one__meta -->
                    </div><!-- /.tour-one__content -->
                </div><!-- /.tour-one__single -->
            </div><!-- /.col-lg-4 -->
            <div class="col-xl-4 col-lg-6">
                <div class="tour-one__single">
                    <div class="tour-one__image">
                        <img src="'assets/images/tour/tour-1-6.jpg" alt="">
                        <a href="tour-details.html"><i class="fa fa-heart"></i></a>
                    </div><!-- /.tour-one__image -->
                    <div class="tour-one__content">
                        <div class="tour-one__stars">
                            <i class="fa fa-star"></i> 8.0 Superb
                        </div><!-- /.tour-one__stars -->
                        <h3><a href="tour-details.html">Discover Depth of Beach</a></h3>
                        <p><span>$1399</span> / Per Person</p>
                        <ul class="tour-one__meta list-unstyled">
                            <li><a href="tour-details.html"><i class="far fa-clock"></i> 3 Days</a></li>
                            <li><a href="tour-details.html"><i class="far fa-user-circle"></i> 12+</a></li>
                            <li><a href="tour-details.html"><i class="far fa-map"></i> Los Angeles</a></li>
                        </ul><!-- /.tour-one__meta -->
                    </div><!-- /.tour-one__content -->
                </div><!-- /.tour-one__single -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.tour-one -->


<div class="brand-one">
    <div class="container">
        <div class="brand-one__carousel owl-theme owl-carousel thm__owl-carousel" data-options='{"nav": false, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 700, "dots": false, "margin": 115, "responsive": { "0": { "items": 2, "margin": 20 }, "480": { "items": 2, "margin": 20 }, "767": { "items": 3, "margin": 20 }, "991": { "items": 4, "margin": 40 }, "1199": { "items": 5 } }}'>
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
            <div class="item">
                <img src="'assets/images/resources/brand-1-1.png" alt="">
            </div><!-- /.item -->
        </div><!-- /.brand-one__carousel owl-theme owl-carousel thm__owl-carousel -->
    </div><!-- /.container -->
</div><!-- /.brand-one -->
<section class="testimonials-one">
    <div class="container">
        <div class="block-title text-center">
            <p>checkout our</p>
            <h3>Top Tour Reviews</h3>
        </div><!-- /.block-title -->
        <div class="testimonials-one__carousel thm__owl-carousel light-dots owl-carousel owl-theme" data-options='{"nav": false, "autoplay": true, "autoplayTimeout": 5000, "smartSpeed": 700, "dots": true, "margin": 30, "loop": true, "responsive": { "0": { "items": 1, "nav": true, "navText": ["Prev", "Next"], "dots": false }, "767": { "items": 1, "nav": true, "navText": ["Prev", "Next"], "dots": false }, "991": { "items": 2 }, "1199": { "items": 2 }, "1200": { "items": 3 } }}'>
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-1.jpg" alt="">
                        <h3>Kevin Smith</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-2.jpg" alt="">
                        <h3>Christine Eve</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-3.jpg" alt="">
                        <h3>Mike Hardson</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-1.jpg" alt="">
                        <h3>Kevin Smith</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-2.jpg" alt="">
                        <h3>Christine Eve</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-3.jpg" alt="">
                        <h3>Mike Hardson</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-1.jpg" alt="">
                        <h3>Kevin Smith</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-2.jpg" alt="">
                        <h3>Christine Eve</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
            <div class="item">
                <div class="testimonials-one__single">
                    <div class="testimonials-one__content">
                        <div class="testimonials-one__stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div><!-- /.testimonials-one__stars -->
                        <p>There are many variations of passages of lorem ipsum but the majority have alteration in some
                            form, by randomised words look. Aene an commodo ligula eget dolorm sociis.</p>
                    </div><!-- /.testimonials-one__content -->
                    <div class="testimonials-one__info">
                        <img src="'assets/images/testimonials/testimonials-1-3.jpg" alt="">
                        <h3>Mike Hardson</h3>
                    </div><!-- /.testimonials-one__info -->
                </div><!-- /.testimonials-one__single -->
            </div><!-- /.item -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.testimonials-one -->

<section class="funfact-one">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-2 col-md-6">
                <div class="funfact-one__single">
                    <h3><span class="counter">22</span><!-- /.counter -->+</h3>
                    <p>Professional Tour Guides</p>
                </div><!-- /.funfact-one__single -->
            </div><!-- /.col-lg-2 col-md-6 -->
            <div class="col-xl-2 col-md-6 justify-content-xl-center">
                <div class="funfact-one__single">
                    <h3><span class="counter">84</span><!-- /.counter -->k</h3>
                    <p>Tours are Completed</p>
                </div><!-- /.funfact-one__single -->
            </div><!-- /.col-lg-2 col-md-6 -->
            <div class="col-xl-2 col-md-6 justify-content-xl-center">
                <div class="funfact-one__single">
                    <h3><span class="counter">17</span><!-- /.counter -->+</h3>
                    <p>Traveling Experience</p>
                </div><!-- /.funfact-one__single -->
            </div><!-- /.col-lg-2 col-md-6 -->
            <div class="col-xl-2 col-md-6 justify-content-xl-end text-xl-right">
                <div class="funfact-one__single">
                    <h3><span class="counter">88</span><!-- /.counter -->k</h3>
                    <p>Happy Customers</p>
                </div><!-- /.funfact-one__single -->
            </div><!-- /.col-lg-3 col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.funfact-one -->

<section class="blog-one">
    <div class="container">
        <div class="block-title text-center">
            <p>Check out Our</p>
            <h3>Latest News & Articles</h3>
        </div><!-- /.block-title -->
        <div class="row">
            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="'assets/images/blog/blog-1-1.jpg" alt="">
                        <a href="news-details.html"><i class="fa fa-long-arrow-alt-right"></i></a>
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <ul class="list-unstyled blog-one__meta">
                            <li><a href="news-details.html"><i class="far fa-user-circle"></i> Admin</a></li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a></li>
                        </ul><!-- /.list-unstyled blog-one__meta -->
                        <h3><a href="news-details.html">14 Things to see and do when
                                visiting japan</a></h3>
                    </div><!-- /.blog-one__content -->
                </div><!-- /.blog-one__single -->
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="100ms">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="'assets/images/blog/blog-1-2.jpg" alt="">
                        <a href="news-details.html"><i class="fa fa-long-arrow-alt-right"></i></a>
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <ul class="list-unstyled blog-one__meta">
                            <li><a href="news-details.html"><i class="far fa-user-circle"></i> Admin</a></li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a></li>
                        </ul><!-- /.list-unstyled blog-one__meta -->
                        <h3><a href="news-details.html">Journeys are best measured
                                in new friends</a></h3>
                    </div><!-- /.blog-one__content -->
                </div><!-- /.blog-one__single -->
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                <div class="blog-one__single">
                    <div class="blog-one__image">
                        <img src="'assets/images/blog/blog-1-3.jpg" alt="">
                        <a href="news-details.html"><i class="fa fa-long-arrow-alt-right"></i></a>
                    </div><!-- /.blog-one__image -->
                    <div class="blog-one__content">
                        <ul class="list-unstyled blog-one__meta">
                            <li><a href="news-details.html"><i class="far fa-user-circle"></i> Admin</a></li>
                            <li><a href="news-details.html"><i class="far fa-comments"></i> 2 Comments</a></li>
                        </ul><!-- /.list-unstyled blog-one__meta -->
                        <h3><a href="news-details.html">Travel the most beautiful
                                places in the world</a></h3>
                    </div><!-- /.blog-one__content -->
                </div><!-- /.blog-one__single -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.blog-one -->
@stop