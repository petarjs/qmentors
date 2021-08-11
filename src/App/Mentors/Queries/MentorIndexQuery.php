<?php

namespace App\Mentors\Queries;

use Domain\Users\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class MentorIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = User::role('mentor');

        parent::__construct($query, $request);

        $this
            ->allowedFilters([
                'name',
                'email',
            ])
            ->allowedSorts(
                'created_at',
            );
    }
}
