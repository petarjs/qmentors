<?php

namespace App\Courses\ViewModels;

use App\Courses\Queries\CourseIndexQuery;
use Domain\Courses\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\ViewModels\ViewModel;

class CourseIndexViewModel extends ViewModel
{
    public LengthAwarePaginator $courses;

    public function __construct(CourseIndexQuery $query)
    {
        $this->courses = $query->paginate();
    }
}
