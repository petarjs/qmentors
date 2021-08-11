<?php

namespace Domain\Invitations\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class InvitationState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Accepted::class)
            ->allowTransition(Pending::class, Expired::class);
    }

    abstract public function canBeUsed(): bool;
}
