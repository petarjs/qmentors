<?php

namespace Domain\Assignments\Actions;

use Domain\Assignments\DataTransferObjects\AssignmentData;
use Domain\Assignments\Models\Assignment;
use Domain\Courses\Models\Course;
use Support\Trix\Services\TrixService;

class CreateAssignmentAction
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
    public function execute(Course $course, AssignmentData $data): Assignment
    {
        $transformedData = $this->trixService->transformTrixDataToModel($data->all(), 'assignment');
        $assignment = new Assignment($transformedData);
        $course->assignments()->save($assignment);
        $assignment->save();

        return $assignment;
    }
}
