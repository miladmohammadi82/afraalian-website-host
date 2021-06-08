@extends('profile.index')
@section('adminContent')
<br>
<br>
<br>
<br>
<x-app-layout>
    <div class="container">
        <div class="info-user-auth-patern">
        <h5>اطلاعات شخصی شما</h5>
        <div class="info-user-auth">
            <div class="info-fild-user-auth row">

            <div class="ful-name-user col-lg-6">
                <label for="">نام و نام خانوادگی</label>
                <div class="ful-name-user-content">
                    <x-jet-input id="name" type="text" class="mt-1 block w-full form-control" value="{{ Auth::user()->name }}" disabled autocomplete="name" />
                </div>
            </div>

            <div class="ful-name-user col-lg-6">
                <label for="">ایمیل</label>
                <div class="ful-name-user-content">
                    <x-jet-input id="name" type="text" class="mt-1 block w-full form-control" value="{{ Auth::user()->email }}" wire:model.defer="state.email" disabled autocomplete="name" />
                </div>
            </div>


            <div class="ful-name-user col-lg-6">
                <label for="">تلفن همراه</label>
                <div class="ful-name-user-content">
                    <x-jet-input id="name" type="text" class="mt-1 block w-full form-control" value="{{ Auth::user()->phone }}" disabled autocomplete="name" />
                </div>
            </div>

            <div class="ful-name-user col-lg-6">
                <label for="">کد ملی</label>
                <div class="ful-name-user-content">
                    <x-jet-input id="name" type="text" class="mt-1 block w-full form-control" value="{{ Auth::user()->name }}" disabled autocomplete="name" />
                </div>
            </div>
            <div class="link-edit-info-user">
                <a href="{{ route('editProfile.information') }}"><i class="fas fa-pencil"></i>  ویرایش اطلاعات شخصی </a>
            </div>
            </div>
        </div>
        <div class="contier-orders">
            <h5>آخرین سفارش ها</h5>
            <div class="orders-content">
            <div class="items-order">
                <i class="fal fa-engine-warning fa-5x"></i>
                <h5>چیزی برای نمایش وجود ندارد</h5>
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
@endsection
