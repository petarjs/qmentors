<?php

namespace Domain\Mentors\Rules;

use Domain\Mentors\Models\Mentor;
use Illuminate\Contracts\Validation\Rule;

class MenteeNotAlreadyAssignedToMentor implements Rule
{
    private Mentor $mentor;

    public function __construct(Mentor $mentor)
    {
        $this->mentor = $mentor;
    }

    public function passes($attribute, $value)
    {
        return empty($this->mentor->mentees()->find($value));
    }

    public function message()
    {
        return 'This mentee is already assigned to this mentor.';
    }
}
