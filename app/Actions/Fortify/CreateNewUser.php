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
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'city' => $input['city'],
            'country' => $input['country'],
            'postal_code' => $input['postal_code'],
            'about_you' => $input['about_you'],
            'age' => $input['age'],
            'work' => $input['work'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
