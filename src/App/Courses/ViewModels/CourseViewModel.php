<?php

namespace App\Courses\ViewModels;

use Domain\Courses\Enums\CategoryEnum;
use Domain\Courses\Enums\DifficultyEnum;
use Domain\Courses\Models\Course;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;
use Support\Util\EnumToCollection;

class CourseViewModel extends ViewModel
{
    public ?Course $course;
    public Collection $difficulties;
    public Collection $categories;
    public ?Collection $assignments;

    public function __construct(?Course $course = null)
    {
        $this->course = $course;
        $this->assignments = optional($course)->assignments;
        $this->difficulties = EnumToCollection::transform(DifficultyEnum::class);
        $this->categories = EnumToCollection::transform(CategoryEnum::class);
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
