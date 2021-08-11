<?php

namespace Domain\Invitations\Actions;

use Domain\Invitations\Models\Invitation;
use Domain\Invitations\States\Expired;
use Domain\Users\Models\User;

class FindUserInvitationAction
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
    public function execute(User $user): ?Invitation
    {
        $invitation = Invitation::forUser($user)->get();

        if (!$invitation) {
            return null;
        }
        
        $invitationExpired = CheckIfInvitationExpiredAction::execute($invitation);

        if ($invitationExpired) {
            $invitation->state->transitionTo(Expired::class);
            return null;
        }

        return $invitation;
    }
}
