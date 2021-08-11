<?php

namespace Domain\Invitations\QueryBuilders;

use Domain\Invitations\States\Pending;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Builder;

class InvitationQueryBuilder extends Builder
{
    public function forUser(User $user): self
    {
        return $this
            ->whereState('status', Pending::class)
            ->whereEmail($user->email)
            ->first();
    }
}
