@extends('front.index')
@section('content')
@section('title')
    ثبت نام
@endsection

<main class="client-page">
    <div class="d-flex align-items-center">
        <div class="container">
          <div class="justify-content-center anime fade-in-y fast forgot row" style="margin: 180px 0 0 0;">
            <div class="box-input-auth p-0 rounded col-sm-7 col-md-5 col-lg-4">
                <x-jet-authentication-card>
                    <x-slot name="logo">
                    </x-slot>
                    <form method="POST" action="{{ route('register') }}">
                        <x-jet-validation-errors class="text-danger mb-4" />
                        @csrf

                        <div>
                            <x-jet-label for="name" value="{{ __('نام') }}" />
                            <x-jet-input id="name" placeholder="نام" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('ایمیل') }}" />
                            <x-jet-input id="email" placeholder="ایمیل" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="phone" value="{{ __('تلفن همراه') }}" />
                            <x-jet-input id="phone" placeholder="ایمیل" class="form-control block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('رمز عبور') }}" />
                            <x-jet-input id="password" placeholder="رمز عبور" class="form-control block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('تکرار رمز عبور') }}" />
                            <x-jet-input id="password_confirmation" placeholder="تکرار رمز عبور" class="form-control block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
                        </div>

                        {{-- <br>
                        <div class="form-group">
                            {!! htmlFormSnippet() !!}
                        </div> --}}
                        @error('recaptcha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="btn btn-primary ml-4">
                                {{ __('ثبت نام') }}
                            </x-jet-button>
                        </div>

                        <ul class="login-link mt-2">
                            <li><a href="{{ route('login') }}"><i class="fas fa-user"></i>&nbsp;وارد شوید</a></li>
                        </ul>
                    </form>
                </x-jet-authentication-card>
              </div>
          </div>
        </div>
    </div>
</main>

@endsection

