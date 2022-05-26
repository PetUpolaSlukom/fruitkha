<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets/img/logo.png')}}" alt="Logo Fruitkha">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class=""><a href="{{route('home')}}">Home</a>
{{--                                <ul class="sub-menu">--}}
{{--                                    <li><a href="index.html">Static Home</a></li>--}}
{{--                                    <li><a href="index_2.html">Slider Home</a></li>--}}
{{--                                </ul>--}}
                            </li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="404.html">404 page</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('news')}}">News</a>
{{--                                <ul class="sub-menu">--}}
{{--                                    <li><a href="news.html">News</a></li>--}}
{{--                                    <li><a href="single-news.html">Single News</a></li>--}}
{{--                                </ul>--}}
                            </li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                            <li class="border-right mr-2"><a href="shop.html">Shop</a>
                                <ul class="sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                </ul>
                            </li>
{{--                            {{dd(session()->has('user'))}}--}}

                            @if(session()->has('user'))

                                @if(session()->get('user')->admin)
                                    <li class="orange-text"><a href="{{route('admin')}}" class="orange-text p-2"><i class="fas fa-user-cog mr-2"></i>Admin - {{session()->get('user')->first_name}}</a>
                                @else
                                    <li class="orange-text"><a href="{{route('login')}}" class="orange-text p-2"><i class="far fa-user mr-2"></i>{{session()->get('user')->first_name}}</a>
                                @endif
                                        <ul class="sub-menu">
                                            <li><a href="{{route('doLogout')}}">Logout</a></li>
                                        </ul>
                                    </li>
                            @else
                                <li class="orange-text"><a href="{{route('login')}}" class="p-2">Login</a></li>
                                <li class="orange-text"><a href="{{route('register')}}" class="p-2">Register</a></li>
                            @endif
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
{{--                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>--}}
                                </div>
                            </li>
                        </ul>
                    </nav>
{{--                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>--}}
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input type="text" placeholder="Keywords">
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->
