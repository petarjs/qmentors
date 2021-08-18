<?php

namespace Domain\Mentors\Actions;

use Domain\Mentees\Models\Mentee;
use Domain\Mentors\DataTransferObjects\AssignMenteeData;
use Domain\Mentors\Models\Mentor;

class AssignMenteeToMentorAction
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
    public function execute(Mentor $mentor, AssignMenteeData $data)
    {
        $mentee = Mentee::findOrFail($data->mentee_id);
        $mentor->mentees()->save($mentee);
    }
}
