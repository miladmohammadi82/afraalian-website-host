@extends('front.index')
@section('content')

<main class="client-page">
    <div class="d-flex align-items-center">
        <div class="container">
          <div class="justify-content-center anime fade-in-y fast forgot row" style="margin: 180px 0 0 0;">
            <div class="box-input-auth p-3 rounded col-9 col-sm-7 col-md-5 col-lg-4" >
                <x-guest-layout>
                    <x-jet-authentication-card>
                        <x-slot name="logo">

                        </x-slot>





                        <form method="POST" action="{{ route('password.email') }}">
                            @if (session('status'))
                                <div class="alert alert-success mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <x-jet-validation-errors class="text-danger mb-4" />
                            @csrf

                            <div class="block">
                                <x-jet-label for="email" value="{{ __('ایمیل') }}" />
                                <x-jet-input id="email" placeholder="ایمیل" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="btn btn-success w-100">
                                    {{ __('ارسال رمز عبور') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </x-jet-authentication-card>
                </x-guest-layout>
            </div>
          </div>
        </div>
    </div>
</main>
@endsection
