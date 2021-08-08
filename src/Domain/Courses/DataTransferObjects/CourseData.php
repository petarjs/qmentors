<?php

namespace Domain\Courses\DataTransferObjects;

use Carbon\Carbon;
use CourseState;
use Spatie\DataTransferObject\DataTransferObject;

class CourseData extends DataTransferObject
{
    public string $name;
}
