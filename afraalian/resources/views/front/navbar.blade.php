<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('metaTags')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title') - عسل افراآلیان </title>
</head>

<body>

    <div id="app">
        <header class="header" id="header">
            <div class="container-fluid-for-mobile-header">
                <nav class="main-nav">
                    <div class="icon-mobile-right d-flex align-items-center">
                        <div class="menu-btn" :class="{ open:menuOpen }" @click="menuOpenshow">
                            <div class="menu-btn-burger"></div>
                        </div>
                    </div>

                    <div class="logo comp">
                        <h2>logo</h2>
                    </div>

                    <ul class="main-menu">

                        <li class="nav-link"><a href="/" class="a-nav-link active">خانه</a></li>

                        @foreach ($categories as $category)
                            <li class="nav-link"><a href="#" class="a-nav-link">{{ $category->title }}<i
                                        class="fal fa-angle-down"></i></a>
                                <div class="dropdown">
                                    <ul>
                                        @foreach ($category->children as $childCategory)
                                            <li class="dropdown-link"><a
                                                    href="{{ route('show.category.page', $childCategory->slug) }}">{{ $childCategory->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach


                        <li class="nav-link"><a href="{{ route('about.page') }}" class="a-nav-link">درباره ما</a></li>
                        <li class="nav-link"><a href="{{ route('contact.page') }}" class="a-nav-link">تماس باما</a></li>
                    </ul>





                    <div class="right-menu d-flex">
                        @guest
                            <div class="box-icon-user ml-2" >
                                <a href="{{ route('login') }}">
                                    <i class="far fa-sign-in" style="color:#006fd6"></i>
                                </a>
                            </div>

                            <div class="box-icon-user ml-2" style="background:#006fd6">
                                <a href="{{ route('register') }}">
                                    <i class="far fa-user-plus" style="color:#ffffff"></i>
                                </a>
                            </div>
                        @endguest

                        @auth
                            <div class="box-icon-user ml-2" :class="{ openUser:openMenuUser }" @click="showUserMenu">
                                <i class="far fa-user-circle" style="color:#006fd6"></i>
                            </div>
                        @endauth
                        <div class="search-section pl-3">
                            <div class="pl-3">
                                <a href="#"><i class="fal fa-search fa-lg text-dark"
                                        :class="{ 'fal fa-search-minus':searchBox }"
                                        @click.prevent="addSearchBox"></i></a>
                            </div>

                            {{-- <div class="searchbox" :class="{ showSearchbox:searchBox }">
                        <form action="" >
                            <input class="form-control" type="text" placeholder="جوستجو...">
                            <div class="product-search-ajax">
                                <div class="items-search-ajax">
                                    <div class="img-search-ajax">
                                        <img class="pt-1 mr-2" src="../assets/honey-compressor.jpg" alt="">
                                    </div>
                                    <div class="title-search-ajax">
                                        <p>عسل بهارنارنج ده کیلویی</p>
                                    </div>
                                </div>
                                <div class="items-search-ajax">
                                    <div class="img-search-ajax">
                                        <img class="pt-1 mr-2" src="../assets/honey-compressor.jpg" alt="">
                                    </div>
                                    <div class="title-search-ajax">
                                        <p>عسل بهارنارنج ده کیلویی</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                            <div class="search_wrapper" :class="{ showSearchbox:searchBox }" style="display: block;">
                                <div>
                                    <form action="{{ route('search') }}" class="search-input-box" method="GET">
                                        <i class="far fa-search"></i>
                                        <input type="search" name="query" value="{{ request()->input('query') }}"
                                            placeholder="جستجو در افراآلیان" id="">
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="sopping-cart pl-3">
                            <a href="{{ route('cart.page') }}">

                                <i class="fal fa-shopping-bag fa-lg text-dark"></i>


                                <div class="conter-shopping-cart" style="margin: -34px -6px;"><span>{{ \Cart::getContent()->count() }}</span></div>
                            </a>
                        </div>



                        <div class="buttons-register">
                            @guest
                                <a href="{{ route('login') }}" class="btn-register-system ml-2"><i
                                        class="far fa-sign-in-alt fa-lg"></i>&nbsp;ورود</a>
                                <a href="{{ route('register') }}" class="btn-register-system"><i
                                        class="far fa-user-plus fa-lg"></i>&nbsp;ثبت نام</a>
                            @endguest

                            @auth
                                <a class="cursor-pointer btn btn-profile-header"><i class="fa fa-user fa-gl"></i>&nbsp;محیط
                                    کاربری</a>
                                <div class="dropdown-user-panel-button">
                                    <div class="user-info-user-panel-button">
                                        <div class="image-user"></div>
                                        <div class="name-user"><a
                                                href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a></div>
                                        <ul class="list-info-action">
                                            <li class="mt-2">
                                                <a href="{{ route('profile.show') }}"><i
                                                        class="fa fa-user fa-1x"></i>&nbsp;پروفایل</a>
                                            </li>
                                            <li class="logout-list-profile-dropdown">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <i class="far fa-sign-out-alt"></i>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                        {{ __('خروج') }}
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>

                </nav>


            </div>

            <!-- Start menu mobile -->


            <div class="header-mobile" :class="{ showMenu:mobileMenu }">

                <div class="header-menu">
                    <h3 class="text-center">logoo</h3>
                    <form action="{{ route('search') }}" class="search-box-menu-mobile" method="GET">
                        <input type="text" name="query" value="{{ request()->input('query') }}"
                        placeholder="جستجو در افراآلیان">
                        <div class="input-group-append">
                            <button type="submit" id="searchsubmith" class="btn btn-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>





                <div class="items-menu-mobile">
                    <ul>
                        <li>
                            <a><span class="fas fa-home"></span>&nbsp;خانه</a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a class="click-dropdown-mobile"><span class="fas fa-boxes"></span>&nbsp;{{ $category->title }}<span class="fas fa-chevron-down"></span></a>
                                <div class="dropdown-mobile" id="dropdown-mobile">
                                    <ul>
                                        @foreach ($category->children as $childCategory)
                                            <li><a href="{{ route('show.category.page', $childCategory->slug) }}">{{ $childCategory->title }}</a></li>

                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endforeach


                        <li>
                            <a href="{{ route('profile.show.comments') }}"><span class="fas fa-comment-exclamation"></span>&nbsp;درباره ما</a>
                        </li>

                        <li>
                            <a href="{{ route('profile.show.comments') }}"><span class="fas fa-phone"></span>&nbsp;تماس با ما</a>
                        </li>

                    </ul>
                </div>

            </div>

            <div :class="{ igron:showIgron }" @click="menuOpenshow"></div>
            <!-- END menu mobile -->

            @auth
                <div class="menu-user" :class="{ 'user-show':showMenuUser }">
                    <div class="content-user">
                        <div class="header1">
                            <img class="avatar avatar-65 photo" src="{{ asset('assets/images_min/d41d8cd98f00b204e9800998ecf8427e-min.jpg') }}" height="65" width="65" loading="lazy">
                            <span class="user-name-login-for-mobile">{{ auth()->user()->name }}</span>
                        </div>

                        <div class="items-user">
                            <ul>
                                <li>
                                    <a href="/profile"><span class="fas fa-user"></span>&nbsp;حساب کاربری</a>
                                </li>

                                <li>
                                    <a href="{{ route('orders.user.profile') }}"><span class="fas fa-box-check"></span>&nbsp;سفارشات من</a>
                                </li>

                                <li>
                                    <a href="{{ route('address.user.profile') }}"><span class="fas fa-map-marker-alt"></span>&nbsp;نشانی</a>
                                </li>

                                <li>
                                    <a href="{{ route('profile.show.comments') }}"><span class="fas fa-comments"></span>&nbsp;نظرات</a>
                                </li>

                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn" style="color: #505763;padding: 0 !important;"><span class="fas fa-power-off"></span>&nbsp;خروج</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endauth
            <div :class="{'igrone-user-menu':showIgroneUser}" @click="showUserMenu"></div>
        </header>
