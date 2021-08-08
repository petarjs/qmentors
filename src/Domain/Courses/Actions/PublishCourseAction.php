<?php

namespace Domain\Courses\Actions;

use Domain\Courses\DataTransferObjects\CourseData;
use Published;

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
    public function execute(CourseData $data): CourseData
    {
        $data->state->transitionTo(Published::class);

        return $data;
    }
}
