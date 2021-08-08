<?php

class Published extends CourseState
{
    public static $name = 'published';

    public function active(): bool
    {
        return true;
    }
}
