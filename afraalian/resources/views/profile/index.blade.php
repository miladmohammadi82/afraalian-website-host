@extends('front.index')
@section('content')

<div class="content-page">
    <div class="continer-profile-page">
        <div class="sidebar-profile">
            <div class="user-profile">
                <div class="image-profile">
                    <img src="../../../assets/d41d8cd98f00b204e9800998ecf8427e-min.jpg" alt="">
                </div>
                <ul class="infos-user">
                    <li>
                        <h4>{{ Auth::user()->name }}</h4>
                    </li>
                    <li><small>{{ Auth::user()->phone }}</small></li>
                    <li>
                        <a href="{{ route('editUserPassword') }}"><i class="far fa-pencil"></i>&nbsp;تغییر رمز
                        </a>
                    </li>
                </ul>
            </div>
            <div class="list-user-prodile-section">
                <ul class="list-user-prodile-ul">
                    <li>
                        <a href="/profile"><i class="far fa-user fa-lg"></i>&nbsp;&nbsp;پیشخوان
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('orders.user.profile') }}"><i class="far fa-box-open fa-lg"></i>&nbsp;&nbsp;سفارش های
                            من</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.show.comments') }}"><i class="far fa-comments fa-lg"></i>&nbsp;&nbsp;نظرات
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('address.user.profile') }}"><i class="far fa-route fa-lg"></i>&nbsp;&nbsp;نشانی
                        </a>
                    </li>
                    <li><a href="#" @click.prevent="logout"><i class="far fa-sign-out-alt fa-lg"></i>&nbsp;&nbsp;خروج از
                            حساب</a></li>
                </ul>
            </div>
        </div>
        <div class="content-profile-page">
            @yield('adminContent')
        </div>
    </div>
</div>

@endsection
