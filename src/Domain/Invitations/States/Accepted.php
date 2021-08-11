<?php

namespace Domain\Invitations\States;

class Accepted extends InvitationState
{
    public static string $name = 'accepted';

    public function canBeUsed(): bool
    {
        return false;
    }
}
