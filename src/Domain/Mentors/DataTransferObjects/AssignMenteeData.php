<?php

namespace Domain\Mentors\DataTransferObjects;

use CourseState;
use Spatie\DataTransferObject\DataTransferObject;

class AssignMenteeData extends DataTransferObject
{
    public string $mentee_id;
}
