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
use Support\Trix\Services\TrixService;

class CourseController
{
    private UpdateCourseAction $updateCourseAction;
    private TrixService $trixService;
    private CreateCourseAction $createCourseAction;
    private PublishCourseAction $publishCourseAction;
    private DeleteCourseAction $deleteCourseAction;

    public function __construct(
        CreateCourseAction  $createCourseAction,
        UpdateCourseAction  $updateCourseAction,
        PublishCourseAction $publishCourseAction,
        DeleteCourseAction  $deleteCourseAction,
        TrixService         $trixService
    )
    {
        $this->updateCourseAction = $updateCourseAction;
        $this->trixService = $trixService;
        $this->createCourseAction = $createCourseAction;
        $this->publishCourseAction = $publishCourseAction;
        $this->deleteCourseAction = $deleteCourseAction;
    }

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

    public function update(StoreCourseRequest $request, Course $course)
    {
        $requestData = $this->trixService->transformTrixDataFromRequest($request->validated(), 'course');
        $data = new CourseData($requestData);

        $this->updateCourseAction->execute($course, $data);

        return redirect(route('courses.edit', $course))->with('flash.banner', "Course updated!");
    }

    public function store(StoreCourseRequest $request)
    {
        $requestData = $this->trixService->transformTrixDataFromRequest($request->validated(), 'course');
        $data = new CourseData($requestData);

        $course = $this->createCourseAction->execute($data);

        return redirect(route('courses.edit', $course))->with('flash.banner', "Course created!");
    }

    public function publish(PublishCourseRequest $request, Course $course)
    {
        $this->publishCourseAction->execute($course);

        return redirect(route('courses.index'))->with('flash.banner', "Course published!");
    }

    public function delete(DeleteCourseRequest $request, Course $course)
    {
        $this->deleteCourseAction->execute($course);

        return redirect(route('courses.index'))->with('flash.banner', "Course deleted!");
    }
}
