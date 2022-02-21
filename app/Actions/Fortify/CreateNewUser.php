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
            'name' => ['required', 'string', 'max:255'],
            'sur_name' => ['required','string','max:255'],
            'dni' => ['required','string'],
            'phone' => ['required','string','regex:/^(\+034 )?(\+034)?(9|8|7|6)([0-9]){8}$|(\+034 )?(\+034)?(9|8|7|6)([0-9]){2}(( ){1}([0-9]){3}){2}$|(\+034 )?(\+034)?(9|8|7|6)([0-9]){1}( )([0-9]){3}(( )([0-9]){2}){2}$/'],
            'zip_code'=>['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
   
        return User::create([
            'name' => $input['name'],
            'sur_name' => $input['sur_name'],
            'dni' => $input['dni'],
            'phone' => $input['phone'],
            'zip_code' => $input['zip_code'],
            'user_types' => $input['user_types'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
