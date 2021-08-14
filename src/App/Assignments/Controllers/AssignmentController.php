<?php

namespace App\Assignments\Controllers;

use App\Assignments\Requests\StoreAssignmentRequest;
use App\Assignments\ViewModels\AssignmentViewModel;
use Domain\Assignments\Actions\CreateAssignmentAction;
use Domain\Assignments\Actions\DeleteAssignmentAction;
use Domain\Assignments\Actions\UpdateAssignmentAction;
use Domain\Assignments\DataTransferObjects\AssignmentData;
use Domain\Assignments\Models\Assignment;
use Domain\Courses\Models\Course;
use Support\Trix\Services\TrixService;

class AssignmentController
{
    private TrixService $trixService;
    private UpdateAssignmentAction $updateAssignmentAction;
    private CreateAssignmentAction $createAssignmentAction;
    private DeleteAssignmentAction $deleteAssignmentAction;

    public function __construct(
        TrixService            $trixService,
        UpdateAssignmentAction $updateAssignmentAction,
        CreateAssignmentAction $createAssignmentAction,
        DeleteAssignmentAction $deleteAssignmentAction
    )
    {
        $this->trixService = $trixService;
        $this->updateAssignmentAction = $updateAssignmentAction;
        $this->createAssignmentAction = $createAssignmentAction;
        $this->deleteAssignmentAction = $deleteAssignmentAction;
    }

    public function create(Course $course)
    {
        return (new AssignmentViewModel($course))->view('assignments.edit');
    }

    public function edit(Course $course, Assignment $assignment)
    {
        return (new AssignmentViewModel($course, $assignment))->view('assignments.edit');
    }

    public function update(StoreAssignmentRequest $request, Course $course, Assignment $assignment)
    {
        $requestData = $this->trixService->transformTrixDataFromRequest($request->validated(), 'assignment');
        $data = new AssignmentData($requestData);

        $assignment = $this->updateAssignmentAction->execute($assignment, $data);

        return redirect(route('assignments.edit', [$course, $assignment]))
            ->with('flash.banner', "Assignment updated!");
    }

    public function store(StoreAssignmentRequest $request, Course $course)
    {
        $requestData = $this->trixService->transformTrixDataFromRequest($request->validated(), 'assignment');
        $data = new AssignmentData($requestData);

        $assignment = $this->createAssignmentAction->execute($course, $data);

        return redirect(route('assignments.edit', [$course, $assignment]))
            ->with('flash.banner', "Assignment created!");
    }

    public function delete(Course $course, Assignment $assignment)
    {
        $this->deleteAssignmentAction->execute($assignment);

        return redirect(route('courses.edit', $course))
            ->with('flash.banner', "Assignment deleted!");
    }
}
