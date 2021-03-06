<!--========================== top-area-start ==========================-->
<section class="top-area">
    <div class="container">
        <div class="row">
            <div class="top-area-content">
                <div class="col-md-6 col-sm-6 col-xs-5">
                    <div class="logo text-left">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/frontend/images/logo3.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-7">
                    <div class="social-icon text-right">
                        @guest
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-pinterest"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-rss"></i></a>
                        @else
                            <a>
                                <img src="{{ Auth::user()->imageUrl }}">
                            </a>
                            <label id="avatar-text">{{ Auth::user()->name }}</label>
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================== menu-area-start ==========================-->
<section class="menu-area">
<div class="container">
    <div class="row">
        <div class="menu-area-content clearfix">
            <div class="col-md-7 col-sm-9 col-xs-12">
                <div class="main-menu text-left">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            @auth
                                <li class="{{ Request::is('*/dashboard') ? 'active' : '' }}">
                                    <a>Profile</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a id="dashboard" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                            <li class="{{ Request::is('about') ? 'active' : '' }}">
                                <a href="{{ route('about') }}">About me</a>
                            </li>
                            @guest
                                <li class="{{ Request::is('post/create') ? 'active' : '' }}">
                                    <a href="{{ route('post.create') }}">Create Article</a>
                                </li>
                            @endguest
                            <li class="{{ Request::is('post/category') ? 'active' : '' }}">
                                <a href="{{ route('post.category') }}">Categories</a>
                            </li>
                            <li class="{{ Request::is('contact') ? 'active' : '' }}">
                                <a href="{{ route('contact') }}">Contact</a>
                            </li>
                            @guest
                                <li class="{{ (Request::is('login') || Request::is('register')) ? 'active' : '' }}">
                                    <a href="{{ route('login') }}">Signup/Login</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-3 col-xs-12">
                <div class="search-btn text-right">
                    <form action="{{ route('post.search') }}" method="get">
                        <input type="search" name="query" value="{{ $query ?? '' }}"
                               placeholder="Type to search here" required/>
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
