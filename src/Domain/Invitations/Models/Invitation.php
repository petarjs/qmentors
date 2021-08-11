<?php

namespace Domain\Invitations\Models;

use Domain\Invitations\QueryBuilders\InvitationQueryBuilder;
use Domain\Invitations\States\InvitationState;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;
use Spatie\Permission\Models\Role;

class Invitation extends Model
{
    use HasStates;

    protected $casts = [
        'state' => InvitationState::class,
    ];

    public function newEloquentBuilder($query): InvitationQueryBuilder
    {
        return new InvitationQueryBuilder($query);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
