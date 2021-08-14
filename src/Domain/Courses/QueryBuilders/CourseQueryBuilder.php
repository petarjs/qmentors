<?php

namespace Domain\Courses\QueryBuilders;

use Domain\Courses\States\Published;
use Illuminate\Database\Eloquent\Builder;

class CourseQueryBuilder extends Builder
{
    public function published(): self
    {
        return $this
            ->whereState('state', Published::class);
    }
}
