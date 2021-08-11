<?php

namespace Domain\Invitations\Models;

use Domain\Invitations\QueryBuilders\InvitationQueryBuilder;
use Domain\Invitations\States\InvitationState;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\ModelStates\HasStates;
use Spatie\Permission\Models\Role;

class Invitation extends Model
{
    use HasStates;
    use LogsActivity;

    protected $casts = [
        'state' => InvitationState::class,
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    public function newEloquentBuilder($query): InvitationQueryBuilder
    {
        return new InvitationQueryBuilder($query);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
