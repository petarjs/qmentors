<?php

namespace Domain\Mentors\Rules;

use Domain\Mentors\Models\Mentor;
use Illuminate\Contracts\Validation\Rule;

class CourseNotAlreadyAssignedToMentor implements Rule
{
    private Mentor $mentor;
    private $course_id;

    public function __construct(Mentor $mentor)
    {
        $this->mentor = $mentor;
    }

    public function passes($attribute, $value)
    {
        return empty($this->mentor->courses()->find($value));
    }

    public function message()
    {
        return 'The course is already assigned to this mentor.';
    }
}
