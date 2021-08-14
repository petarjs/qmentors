<?php

namespace Domain\Invitations\Actions;

use Domain\Invitations\DataTransferObjects\InvitationData;
use Domain\Invitations\Models\Invitation;

class InviteUserAction
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
    public function execute(InvitationData $data): void
    {
        $invitation = new Invitation();
        $invitation->email = $data->email;
        $invitation->role_id = $data->role_id;
        $invitation->save();
    }
}
