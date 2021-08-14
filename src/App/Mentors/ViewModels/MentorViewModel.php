<?php

namespace App\Mentors\ViewModels;

use Domain\Courses\Models\Course;
use Domain\Mentors\Models\Mentor;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class MentorViewModel extends ViewModel
{
    public ?Mentor $mentor;
    public Collection $courses;
    public Collection $assignedCourses;

    public function __construct(?Mentor $mentor)
    {
        $this->mentor = $mentor;
        $this->courses = Course::published()->get();
        $this->assignedCourses = $mentor->courses;
    }
}
