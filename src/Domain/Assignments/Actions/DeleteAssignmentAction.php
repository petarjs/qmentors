<?php

namespace Domain\Assignments\Actions;

use Domain\Assignments\Models\Assignment;

class DeleteAssignmentAction
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
    public function execute(Assignment $assignment): void
    {
        // @todo delete related trix content
        $assignment->delete();
    }
}
