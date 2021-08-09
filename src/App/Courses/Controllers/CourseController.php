<?php

namespace App\Courses\Controllers;

use App\Courses\Queries\CourseIndexQuery;
use App\Courses\Requests\DeleteCourseRequest;
use App\Courses\Requests\PublishCourseRequest;
use App\Courses\Requests\StoreCourseRequest;
use App\Courses\ViewModels\CourseIndexViewModel;
use App\Courses\ViewModels\CourseViewModel;
use Domain\Courses\Actions\CreateCourseAction;
use Domain\Courses\Actions\DeleteCourseAction;
use Domain\Courses\Actions\PublishCourseAction;
use Domain\Courses\Actions\UpdateCourseAction;
use Domain\Courses\DataTransferObjects\CourseData;
use Domain\Courses\Models\Course;
use Illuminate\Http\Request;

class CourseController
{
    public function index(Request $request, CourseIndexQuery $query)
    {
        return (new CourseIndexViewModel($query))->view('courses.index');
    }

    public function create()
    {
        return (new CourseViewModel())->view('courses.edit');
    }

    public function edit(Course $course)
    {
        return (new CourseViewModel($course))->view('courses.edit');
    }


    public function update(StoreCourseRequest $request, Course $course, UpdateCourseAction $updateCourseAction)
    {
        $data = new CourseData($request->validated());

        $updateCourseAction->execute($course, $data);

        return redirect(route('courses.index'));
    }

    public function store(StoreCourseRequest $request, CreateCourseAction $createCourseAction)
    {
        $data = new CourseData($request->validated());

        $course = $createCourseAction->execute($data);

        return redirect(route('courses.edit', $course));
    }

    public function publish(PublishCourseRequest $request, Course $course, PublishCourseAction $publishCourseAction)
    {
        $publishCourseAction->execute($course);

        return redirect(route('courses.index'));
    }

    public function delete(DeleteCourseRequest $request, Course $course, DeleteCourseAction $deleteCourseAction)
    {
        $deleteCourseAction->execute($course);

        return redirect(route('courses.index'));
    }
}
