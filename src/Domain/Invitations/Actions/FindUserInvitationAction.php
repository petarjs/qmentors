<?php

namespace Domain\Invitations\Actions;

use Domain\Invitations\Models\Invitation;
use Domain\Invitations\States\Expired;
use Domain\Users\Models\User;

class FindUserInvitationAction
{
    private CheckIfInvitationExpiredAction $checkIfInvitationExpiredAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct(CheckIfInvitationExpiredAction $checkIfInvitationExpiredAction)
    {
        // Prepare the action for execution, leveraging constructor injection.
        $this->checkIfInvitationExpiredAction = $checkIfInvitationExpiredAction;
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(User $user): ?Invitation
    {
        $invitation = Invitation::forUser($user)->first();

        if (!$invitation) {
            return null;
        }

        $invitationExpired = $this->checkIfInvitationExpiredAction->execute($invitation);

        if ($invitationExpired) {
            $invitation->state->transitionTo(Expired::class);
            return null;
        }

        return $invitation;
    }
}
