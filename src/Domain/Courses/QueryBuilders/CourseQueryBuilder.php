<?php

namespace Domain\Courses\QueryBuilders;

use Domain\Courses\States\Published;
use Domain\Mentors\Models\Mentor;
use Illuminate\Database\Eloquent\Builder;

class CourseQueryBuilder extends Builder
{
    public function published(): self
    {
        return $this
            ->whereState('state', Published::class);
    }

    public function notTaughtBy(Mentor $mentor): self
    {
        return $this->whereDoesntHave('mentors', function ($q) use ($mentor) {
            $q->whereId($mentor->id);
        });
    }
}
