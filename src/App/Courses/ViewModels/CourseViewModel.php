<?php

namespace App\Courses\ViewModels;

use Domain\Courses\Models\Course;
use Spatie\ViewModels\ViewModel;

class CourseViewModel extends ViewModel
{
    public ?Course $course;

    public function __construct(?Course $course = null)
    {
        $this->course = $course;
    }

    public function course(): Course
    {
        return $this->course ?? new Course();
    }

    public function isEditing()
    {
        return $this->course()->id != null;
    }
}
