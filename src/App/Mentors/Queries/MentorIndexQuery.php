<?php

namespace App\Mentors\Queries;

use Domain\Mentors\Models\Mentor;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class MentorIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Mentor::query();

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
