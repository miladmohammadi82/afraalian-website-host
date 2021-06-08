@extends('profile.index')
@section('adminContent')

<br>
<br>
<br>

<div class="show-address-user-checkout">
    <div class="show-address-user-checkout-content">
        <div class="show-address-user-checkout-title">آدرس تحویل سفارش</div>

        <ul class="show-address-user-checkout-items">
            <li><i class="far fa-map-marked-alt"></i> {{ $addresses->address }}</li>
            <li><i class="far fa-user"></i> {{ $addresses->fullname }}</li>
            <li><i class="far fa-phone"></i> {{ $addresses->phone }}</li>
            <li><i class="far fa-mailbox"></i> {{ $addresses->zipcode }}</li>
            <!-- Button trigger modal -->
            <li><a href="{{ route('edit.address.user.profile', $addresses->id) }}">ویرایش آدرس</a></li>
        </ul>

    </div>
</div>

@endsection
