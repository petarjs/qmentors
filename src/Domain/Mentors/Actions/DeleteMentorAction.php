<?php

namespace Domain\Mentors\Actions;

use Domain\Mentors\Models\Mentor;

class DeleteMentorAction
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
    public function execute(Mentor $mentor)
    {
        $mentor->delete();
    }
}
