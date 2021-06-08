<div class="d-flex align-items-center edit-password-section-box">
    <div class="container">
        <div class="justify-content-center anime fade-in-y fast forgot row">
            <div class=" p-3 rounded col-9 col-sm-7 col-md-5 col-lg-4">
                <div class="">
                    <x-jet-form-section submit="updatePassword">
                        <x-slot name="title">

                        </x-slot>

                        <x-slot name="description">
                        </x-slot>

                        <x-slot name="form">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success')}}
                                </div>
                            @endif
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="current_password" value="{{ __('رمز قبلی') }}" />
                                <x-jet-input id="current_password" type="password" placeholder="رمز قبلی" class="mt-1 block w-full form-control" wire:model.defer="state.current_password" autocomplete="current-password" />
                                <x-jet-input-error for="current_password" class="mt-2 text-danger" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="password" value="{{ __('رمز جدید') }}" />
                                <x-jet-input id="password" type="password" placeholder="رمز جدید" class="mt-1 block w-full form-control" wire:model.defer="state.password" autocomplete="new-password" />
                                <x-jet-input-error for="password" class="mt-2 text-danger" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="password_confirmation" value="{{ __('تکرار رمز جدید') }}" />
                                <x-jet-input id="password_confirmation" placeholder="تکرار رمز جدید" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                                <x-jet-input-error for="password_confirmation" class="mt-2 text-danger" />
                            </div>
                        </x-slot>

                        <x-slot name="actions">
                            <x-jet-action-message class="mr-3" on="saved">
                                {{ __('Saved.') }}
                            </x-jet-action-message>

                            <x-jet-button class="btn btn-success w-100">
                                {{ __('Save') }}
                            </x-jet-button>
                        </x-slot>
                    </x-jet-form-section>
                </div>
            </div>
        </div>
    </div>
</div>
