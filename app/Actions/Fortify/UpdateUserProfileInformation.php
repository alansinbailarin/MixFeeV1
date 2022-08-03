<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'ubication' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'birthday' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'string', 'max:255'],
            'ocupation' => ['required', 'string', 'max:255'],
            'current_job' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:255'],
            'linkedin_url' => ['required', 'string', 'max:100'],
            'biography' => ['required', 'string', 'max:4000'],
            'experience' => ['required', 'string', 'max:2000'],
            'education' => ['required', 'string', 'max:255'],
            'languajes' => ['required', 'string', 'max:255'],
            'courses' => ['required', 'string', 'max:255'],
            'skills' => ['required', 'string', 'max:255'],
            'interests' => ['required', 'string', 'max:255'],
            'knownments' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'ubication' => $input['ubication'],
                'email' => $input['email'],
                'birthday' => $input['birthday'],
                'gender' => $input['gender'],
                'ocupation' => $input['ocupation'],
                'current_job' => $input['current_job'],
                'phone_number' => $input['phone_number'],
                'linkedin_url' => $input['linkedin_url'],
                'biography' => $input['biography'],
                'experience' => $input['experience'],
                'education' => $input['education'],
                'languajes' => $input['languajes'],
                'courses' => $input['courses'],
                'skills' => $input['skills'],
                'interests' => $input['interests'],
                'knownments' => $input['knownments'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
