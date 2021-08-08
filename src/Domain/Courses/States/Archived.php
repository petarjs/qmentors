<?php

class Archived extends CourseState
{
    public static $name = 'archived';

    public function active(): bool
    {
        return false;
    }
}
