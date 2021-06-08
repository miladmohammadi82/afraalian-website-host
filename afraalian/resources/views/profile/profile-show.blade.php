@extends('profile.index')
@section('adminContent')

<x-app-layout>
    <div class="alert alert-success" v-if="showAlertEditProfileInformation" role="alert">
        This is a success alert—check it out!
    </div>
    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        @livewire('profile.update-profile-information-form')
    @endif

</x-app-layout>
@endsection
