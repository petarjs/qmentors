<?php

namespace Domain\Courses\Actions;

use Domain\Courses\DataTransferObjects\CourseData;
use Domain\Courses\Models\Course;
use Support\Services\TrixService;

class CreateCourseAction
{
    private TrixService $trixService;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct(TrixService $trixService)
    {
        // Prepare the action for execution, leveraging constructor injection.
        $this->trixService = $trixService;
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(CourseData $data): Course
    {
        $transformedData = $this->trixService->transformTrixDataToModel($data->all(), 'course');
        $course = Course::create($transformedData);

        return $course;
    }
}
