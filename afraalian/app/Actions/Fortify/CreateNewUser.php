<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $message = [
            'name.required'=>'فیلد نام نمیتواند خالی باشد.',
            'email.required'=>'فیلد ایمیل نمیتواند خالی باشد.',
            'email.email'=>'این ایمیل نا معتبر است.',
            'email.unique'=>'این ایمیل از قبل وجود دارد.',
            'phone.required'=>'فیلد شماره تلفن نمیتواند خالی باشد.',
            'phone.min'=>'این تلفن نا معتبر هست.',
            'password.required'=>'فیلد شماره  رمز عبور نمیتواند خالی باشد',
        ];

        Validator::make($input, [
            'name' => ['required', 'string',],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'min:11'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            // recaptchaFieldName() => recaptchaRuleName()
        ], $message)->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
