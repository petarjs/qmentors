<?php

namespace App\Mentors\ViewModels;

use Domain\Courses\Models\Course;
use Domain\Mentees\Models\Mentee;
use Domain\Mentors\Models\Mentor;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class MentorViewModel extends ViewModel
{
    public ?Mentor $mentor;
    public Collection $availableCourses;
    public Collection $assignedCourses;
    public Collection $availableMentees;
    public Collection $assignedMentees;

    public function __construct(?Mentor $mentor)
    {
        $this->mentor = $mentor;
        $this->availableCourses = Course::published()->notTaughtBy($mentor)->get();
        $this->assignedCourses = $mentor->courses;
        $this->assignedMentees = $mentor->mentees;
        $this->availableMentees = Mentee::withoutMentor()->get();
    }
}
