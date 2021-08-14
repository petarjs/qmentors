<?php

namespace App\Assignments\ViewModels;

use Domain\Assignments\Models\Assignment;
use Domain\Courses\Models\Course;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class AssignmentViewModel extends ViewModel
{
    public ?Assignment $assignment;
    public Course $course;
    public Collection $assignments;

    public function __construct(Course $course, ?Assignment $assignment = null)
    {
        $this->course = $course;
        $this->assignment = $assignment;
        $this->assignments = $course->assignments;
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
