<?php

namespace Domain\Assignments\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class AssignmentQueryBuilder extends Builder
{
    public function ordered(): self
    {
        return $this
            ->orderBy('order', 'asc');
    }
}
