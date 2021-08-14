<?php

namespace App\Auth\Controllers;

use Domain\Invitations\Actions\AcceptInvitationAction;
use Domain\Invitations\Actions\FindUserInvitationAction;
use Domain\Users\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController
{
    private FindUserInvitationAction $findUserInvitationAction;
    private AcceptInvitationAction $acceptInvitationAction;

    public function __construct(
        FindUserInvitationAction $findUserInvitationAction,
        AcceptInvitationAction   $acceptInvitationAction
    )
    {
        $this->findUserInvitationAction = $findUserInvitationAction;
        $this->acceptInvitationAction = $acceptInvitationAction;
    }

    public function redirectToGoogle()
    {
        try {

            return Socialite::driver('google')
                ->with(['hd' => config('services.google.allowed_login_domain')])
                ->redirect();
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function handleGoogleCallback()
    {
        try {

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {

                Auth::login($user);

                return redirect()->intended('dashboard');

            } else {
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => encrypt('123456dummy')
                ]);

                $invitation = $this->findUserInvitationAction->execute($newUser);

                if ($invitation) {
                    $this->acceptInvitationAction->execute($invitation, $newUser);
                } else {
                    $newUser->assignRole('mentee');
                }

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e);
        }
    }

}
