@extends('front.index')
@section('content')

    @section('title')
        ورود
    @endsection


<main class="client-page">
    <div class="d-flex align-items-center">
        <div class="container">
          <div class="justify-content-center anime fade-in-y fast forgot row" style="margin: 180px 0 0 0;">
            <div class="box-input-auth p-0 rounded col-sm-7 col-md-5 col-lg-4">
                <x-jet-authentication-card>
                    <x-slot name="logo">

                    </x-slot>



                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="content-form-form" method="POST" action="{{ route('login') }}">
                        <div class="row">


                            <x-jet-validation-errors class="mb-4 text-danger" />
                            @csrf

                            <div class="col-sm-12">
                                <x-jet-label for="email" value="{{ __('ایمیل') }}" />
                                <x-jet-input id="email" placeholder="ایمیل" class="block w-full mt-2 form-control  @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')"  autofocus />
                            </div>



                            <div class="mt-4 col-sm-12">
                                <x-jet-label for="password" value="{{ __('رمز عبور') }}" />
                                <x-jet-input id="password" placeholder="رمز عبور" class="block mt-1 w-full form-control" type="password" name="password"  autocomplete="current-password" />
                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('مرا به خواطر بسپار') }}</span>
                                </label>
                            </div>
                            <br>
                            {{-- <div class="form-group">
                                {!! htmlFormSnippet() !!}
                            </div> --}}

                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="btn btn-primary ml-4">
                                    {{ __('ورود') }}
                                </x-jet-button>
                            </div>
                            <br>
                            <ul class="login-link">
                                <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i>&nbsp;ثبت نام کنید</a></li>
                                @if (Route::has('password.request'))
                                    <li ><a href="{{ route('password.request') }}"><i class="fas fa-lock mt-2"></i>&nbsp;رمز عبور خودم را فراموش کرده ام!</a></li>
                                @endif
                            </ul>

                        </div>
                    </form>
                </x-jet-authentication-card>
            </div>
          </div>
        </div>
    </div>
</main>

@endsection
