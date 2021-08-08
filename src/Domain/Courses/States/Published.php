<?php

namespace Domain\Courses\States;

class Published extends CourseState
{
    public static string $name = 'published';

    public function active(): bool
    {
        return true;
    }
}
