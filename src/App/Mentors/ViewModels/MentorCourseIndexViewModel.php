<?php

namespace App\Mentors\ViewModels;

use Domain\Mentors\Models\Mentor;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class MentorCourseIndexViewModel extends ViewModel
{
    public Collection $myCourses;
    public Mentor $mentor;

    public function __construct()
    {
        $this->mentor = Mentor::find(auth()->id());
        $this->myCourses = $this->mentor->courses;
    }
}
