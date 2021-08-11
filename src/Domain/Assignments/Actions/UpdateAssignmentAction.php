<?php

namespace Domain\Assignments\Actions;

use Domain\Assignments\DataTransferObjects\AssignmentData;
use Domain\Assignments\Models\Assignment;
use Support\Trix\Services\TrixService;

class UpdateAssignmentAction
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
    public function execute(Assignment $assignment, AssignmentData $data): Assignment
    {
        $transformedData = $this->trixService->transformTrixDataToModel($data->all(), 'assignment');
        $assignment->update($transformedData);

        return $assignment;
    }
}
