<?php

namespace Domain\Mentees\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class MenteeQueryBuilder extends Builder
{
    public function withoutMentor(): self
    {
        return $this->whereNull('mentor_id');
    }
}
