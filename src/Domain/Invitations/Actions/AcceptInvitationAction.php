<?php

namespace Domain\Invitations\Actions;

use Domain\Invitations\Models\Invitation;
use Domain\Invitations\States\Accepted;
use Domain\Users\Models\User;

class AcceptInvitationAction
{
    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(Invitation $invitation, User $user): void
    {
        $user->assignRole($invitation->role);
        $invitation->state->transitionTo(Accepted::class);
    }
}
