<?php

namespace App\Courses\ViewModels;

use Domain\Courses\Enums\CategoryEnum;
use Domain\Courses\Enums\DifficultyEnum;
use Domain\Courses\Models\Course;
use Spatie\ViewModels\ViewModel;

class CourseViewModel extends ViewModel
{
    public ?Course $course;
    public array $difficulties;
    public array $categories;

    public function __construct(?Course $course = null)
    {
        $this->course = $course;
        $this->difficulties = DifficultyEnum::toArray();
        $this->categories = CategoryEnum::toArray();
    }

    public function isEditing()
    {
        return $this->course()->id != null;
    }

    public function course(): Course
    {
        return $this->course ?? new Course();
    }
}
