<?php

namespace Domain\Courses\Actions;

use Domain\Courses\DataTransferObjects\CourseData;
use Domain\Courses\Models\Course;
use Support\Trix\Services\TrixService;

class UpdateCourseAction
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
    public function execute(Course $course, CourseData $data): Course
    {
        $transformedData = $this->trixService->transformTrixDataToModel($data->all(), 'course');
        $course->update($transformedData);

        return $course;
    }
}
