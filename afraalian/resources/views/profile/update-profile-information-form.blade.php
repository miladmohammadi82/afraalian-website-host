<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{-- {{ __('Profile Information') }} --}}
    </x-slot>

    <x-slot name="description">
        {{-- {{ __('Update your account\'s profile information and email address.') }} --}}
    </x-slot>
        <div class="container">


            <div class="info-user-auth">

                <div class="info-fild-user-auth row">
                    <x-slot name="form">
                        <x-jet-validation-errors class="mb-4 text-danger" />
                        <div class="ful-name-user col-lg-6">
                            <div class="input-fild-box form-group">
                                <label for="">نام و نام خانوادگی *</label>
                                <input type="text" class="mt-2 form-control" wire:model.defer="state.name" placeholder="نام و نام خانوادگی" name="name" id="">
                            </div>
                        </div>

                        <div class="ful-name-user col-lg-6">
                            <div class="input-fild-box form-group">
                                <label for="">ایمیل *</label>
                                <input type="text" class="mt-2 form-control" wire:model.defer="state.email" placeholder="ایمیل" name="email" id="">
                            </div>
                        </div>


                        <div class="ful-name-user col-lg-6">
                            <div class="input-fild-box form-group">
                                <label for="">تلفن همراه *</label>
                                <input type="text" class="mt-2 form-control" wire:model.defer="state.phone" placeholder="تلفن همراه" name="phone" id="">
                            </div>
                        </div>

                        <div class="ful-name-user col-lg-6">
                            <div class="input-fild-box form-group">
                                <label for="">کد ملی *</label>
                                <input type="text" class="mt-2 form-control" wire:model.defer="state.name" placeholder="کد ملی" name="" id="">
                            </div>
                        </div>

                        <div class="ful-name-user col-lg-12">
                            <div class="input-fild-box form-group">
                                <label for="">کد پستی *</label>
                                <input type="text" class="mt-2 form-control" wire:model.defer="state.name" placeholder="کد پستی" name="" id="">
                            </div>
                        </div>
                        <x-slot name="actions">
                            <x-jet-action-message class="mr-3" on="saved">
                                {{ __('Saved.') }}
                            </x-jet-action-message>

                            <x-jet-button class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
                                {{ __('Save') }}
                            </x-jet-button>
                        </x-slot>
                    </x-slot>
                </div>
            </div>
        </div>
</x-jet-form-section>

