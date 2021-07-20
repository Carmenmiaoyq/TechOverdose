<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Carbon\Carbon;
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
            'name' => ['required', 'alpha_dash', 'max:30', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

      /* return $user = User::create([ */
      /*       'name' => $input['name'], */
      /*       'email' => $input['email'], */
      /*       'password' => Hash::make($input['password']), */
      /*   ]); */

        // Uncomment lines above and comment lines below to test MailTrap
        //
        // like this no email is send to e.g. MailTrap since email is already verified
        return tap(User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),

        ]), function($user){
            $user->forceFill(['email_verified_at' => Carbon::now()->toDateTimeString()])->save();
        });

    }
}
