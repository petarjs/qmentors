<?php

namespace App\Mentors\Controllers;

use App\Mentors\ViewModels\MentorCourseIndexViewModel;

class MentorController
{
    public function myCourses()
    {
        return (new MentorCourseIndexViewModel())->view('mentors.courses.index');
    }
}
