<?php

namespace App\Courses\Controllers;

use App\Courses\Queries\CourseIndexQuery;
use App\Courses\Requests\StoreCourseRequest;
use App\Courses\ViewModels\CourseIndexViewModel as ViewModelsCourseIndexViewModel;
use App\Courses\ViewModels\CourseViewModel as ViewModelsCourseViewModel;
use Illuminate\Http\Request;

class CourseController
{
    public function index(CourseIndexQuery $query)
    {
        return (new ViewModelsCourseIndexViewModel($query))->view('courses.index');
    }

    public function create()
    {
        return (new ViewModelsCourseViewModel())->view('courses.index');
    }

    public function edit($course)
    {
        return (new CourseViewModel($course))->view('courses.index');
    }


    public function update(StoreCourseRequest $request, $course)
    {
        return redirect(route('courses.index'));
    }
}
