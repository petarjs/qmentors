<?php

namespace Domain\Invitations\States;

class Expired extends InvitationState
{
    public static string $name = 'expired';

    public function canBeUsed(): bool
    {
        return false;
    }
}
