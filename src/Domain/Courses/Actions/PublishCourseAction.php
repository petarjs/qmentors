<?php

namespace Domain\Courses\Actions;

use Domain\Courses\Models\Course;
use Domain\Courses\States\Published;

class PublishCourseAction
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
    public function execute(Course $course): Course
    {
        $course->state->transitionTo(Published::class);
        $course->update(['published_at' => now()]);

        return $course;
    }
}
