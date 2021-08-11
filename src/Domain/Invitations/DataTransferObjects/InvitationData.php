<?php

namespace Domain\Invitations\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class InvitationData extends DataTransferObject
{
    public string $email;

    public int $role_id;
}
