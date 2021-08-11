<?php

namespace Domain\Invitations\States;

class Pending extends InvitationState
{
    public static string $name = 'pending';

    public function canBeUsed(): bool
    {
        return true;
    }
}
