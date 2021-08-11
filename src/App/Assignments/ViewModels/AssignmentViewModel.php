<?php

namespace App\Assignments\ViewModels;

use Domain\Assignments\Models\Assignment;
use Domain\Courses\Models\Course;
use Spatie\ViewModels\ViewModel;

class AssignmentViewModel extends ViewModel
{
    public ?Assignment $assignment;
    public Course $course;

    public function __construct(Course $course, ?Assignment $assignment = null)
    {
        $this->assignment = $assignment;

        $this->course = $course;
    }

    public function isEditing()
    {
        return $this->assignment()->id != null;
    }

    public function assignment(): Assignment
    {
        return $this->assignment ?? new Assignment();
    }
}
