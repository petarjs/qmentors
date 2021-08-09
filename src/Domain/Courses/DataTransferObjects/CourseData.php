<?php

namespace Domain\Courses\DataTransferObjects;

use CourseState;
use Spatie\DataTransferObject\DataTransferObject;

class CourseData extends DataTransferObject
{
    public string $name;

    public string $difficulty;

    public string $category;
}
