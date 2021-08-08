<?php

namespace Domain\Courses\Actions;

use Domain\Courses\DataTransferObjects\CourseData;
use Domain\Courses\Models\Course;

class CreateCourseAction
{
    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(CourseData $data): Course
    {
        $course = Course::create($data);

        return $course;
    }
}
