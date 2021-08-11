<?php

namespace Domain\Invitations\Actions;

use Domain\Invitations\Models\Invitation;

class CheckIfInvitationExpiredAction
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
    public function execute(Invitation $invitation): bool
    {
        return $invitation->created_at < now()->subDays(config('invitation.invitation_valid_for_days'));
    }
}
