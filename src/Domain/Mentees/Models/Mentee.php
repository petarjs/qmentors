<?php

namespace Domain\Mentees\Models;

use Domain\Mentees\QueryBuilders\MenteeQueryBuilder;
use Domain\Mentors\Models\Mentor;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Support\Traits\HasParentModel;

class Mentee extends User
{
    use SoftDeletes, HasParentModel;

    protected $guard_name = 'web';

    protected $table = 'users';

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function newEloquentBuilder($query): MenteeQueryBuilder
    {
        return new MenteeQueryBuilder($query);
    }

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->role('mentee');
    }
}
