<?php

namespace Domain\Courses\States;

class Draft extends CourseState
{
    public static string $name = 'draft';

    public function active(): bool
    {
        return false;
    }

    public function color(): string
    {
        return 'gray';
    }
}
