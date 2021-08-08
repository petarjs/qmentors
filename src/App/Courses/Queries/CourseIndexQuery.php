<?php

namespace App\Courses\Queries;

use Domain\Courses\Models\Course;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CourseIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Course::query();

        parent::__construct($query, $request);

        $this
            ->allowedFilters(
                'state',
            )
            ->allowedSorts(
                'published_at',
            );
    }
}
