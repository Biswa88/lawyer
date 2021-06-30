<header class="main-nav__header-one ">
    <nav class="header-navigation stricky">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="main-nav__logo-box">
                <a href="{{ url('/') }}" class="main-nav__logo">
                   <img src="{{ asset('assets/images/law_logo.jpg') }}" class="main-logo" width="123" alt="Awesome Image" />
                </a>
                <a href="#" class="side-menu__toggler"><i class="fa fa-bars"></i>
                    <!-- /.smpl-icon-menu --></a>
            </div><!-- /.logo-box -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-nav__main-navigation">
                <ul class=" main-nav__navigation-box">
                    <li class="current">
                        <a href="{{  route('public.home') }}">Home</a>
                        
                    </li>
                    <li class="">
                        <a href="{{  route('about_us') }}">About Us</a>
                        
                    </li>
                    <li class="">
                        <a href="{{  route('contact_us') }}">Contact</a>
                        
                    </li>
                    <li class="">
                        @if(auth()->check()&& auth()->user()->role->name ==='client')
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ url('user-profile') }}" class="dropdown-item">Client Dashboard</a>
                            @else
                            <a href="{{ url('public.home') }}" class="dropdown-item"></a>
                            @endif  
                                </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="main-nav__right">
              
                <a href="{{ route('login') }}" class="main-nav__login"><i class="tripo-icon-avatar">Login</i></a>
               
            </div><!-- /.main-nav__right -->
        </div>
        <!-- /.container -->
    </nav>
</header><!-- /.site-header -->