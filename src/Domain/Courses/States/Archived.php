<?php

namespace Domain\Courses\States;

class Archived extends CourseState
{
    public static string $name = 'archived';

    public function active(): bool
    {
        return false;
    }
}
