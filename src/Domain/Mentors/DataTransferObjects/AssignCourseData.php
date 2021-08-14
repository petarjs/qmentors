<?php

namespace Domain\Mentors\DataTransferObjects;

use CourseState;
use Spatie\DataTransferObject\DataTransferObject;

class AssignCourseData extends DataTransferObject
{
    public string $course_id;
}
