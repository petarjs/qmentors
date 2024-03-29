<?php

namespace Domain\Courses\Actions;

use Domain\Courses\Models\Course;

class DeleteCourseAction
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
    public function execute(Course $course): void
    {
        $course->assignments()->delete();
        // @todo delete related trix content
        $course->delete();
    }
}
