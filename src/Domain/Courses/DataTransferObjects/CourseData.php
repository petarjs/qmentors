<?php

namespace Domain\Courses\DataTransferObjects;

use Carbon\Carbon;
use CourseState;
use Spatie\DataTransferObject\DataTransferObject;

class CourseData extends DataTransferObject
{
    public ?string $id;

    public string $name;

    public Carbon $published_at;

    public CourseState $state;
}
