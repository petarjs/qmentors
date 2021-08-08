<?php

class Draft extends CourseState
{
    public static $name = 'draft';

    public function active(): bool
    {
        return false;
    }
}
