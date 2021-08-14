<?php

namespace Domain\Mentors\Actions;

use Domain\Courses\Models\Course;
use Domain\Mentors\DataTransferObjects\AssignCourseData;
use Domain\Mentors\Models\Mentor;

class AssignCourseToMentorAction
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
    public function execute(Mentor $mentor, AssignCourseData $data)
    {
        $course = Course::findOrFail($data->course_id);
        $mentor->courses()->attach($course);
    }
}
