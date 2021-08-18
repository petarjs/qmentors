<?php

namespace App\Mentors\Controllers;

use App\Mentors\Queries\MentorIndexQuery;
use App\Mentors\Requests\AssignMenteeToMentorRequest;
use App\Mentors\Requests\AssignMentorToCourseRequest;
use App\Mentors\Requests\DeleteMentorRequest;
use App\Mentors\Requests\UpdateMentorRequest;
use App\Mentors\ViewModels\MentorIndexViewModel;
use App\Mentors\ViewModels\MentorViewModel;
use Domain\Mentors\Actions\AssignCourseToMentorAction;
use Domain\Mentors\Actions\AssignMenteeToMentorAction;
use Domain\Mentors\Actions\DeleteMentorAction;
use Domain\Mentors\Actions\UpdateMentorAction;
use Domain\Mentors\DataTransferObjects\AssignCourseData;
use Domain\Mentors\DataTransferObjects\AssignMenteeData;
use Domain\Mentors\DataTransferObjects\MentorData;
use Domain\Mentors\Models\Mentor;
use Illuminate\Http\Request;

class ManageMentorsController
{
    private UpdateMentorAction $updateMentorAction;
    private DeleteMentorAction $deleteMentorAction;
    private AssignCourseToMentorAction $assignCourseToMentorAction;
    private AssignMenteeToMentorAction $assignMenteeToMentorAction;

    public function __construct(
        UpdateMentorAction         $updateMentorAction,
        DeleteMentorAction         $deleteMentorAction,
        AssignCourseToMentorAction $assignCourseToMentorAction,
        AssignMenteeToMentorAction $assignMenteeToMentorAction
    )
    {
        $this->updateMentorAction = $updateMentorAction;
        $this->deleteMentorAction = $deleteMentorAction;
        $this->assignCourseToMentorAction = $assignCourseToMentorAction;
        $this->assignMenteeToMentorAction = $assignMenteeToMentorAction;
    }

    public function index(Request $request, MentorIndexQuery $query)
    {
        return (new MentorIndexViewModel($query))->view('mentors.manage.index');
    }

    public function edit(Mentor $mentor)
    {
        return (new MentorViewModel($mentor))->view('mentors.manage.edit');
    }

    public function update(UpdateMentorRequest $request, Mentor $mentor)
    {
        $data = new MentorData($request->validated());

        $mentor = $this->updateMentorAction->execute($mentor, $data);

        return redirect(route('mentors.edit', $mentor))
            ->with('flash.banner', "Mentor updated!");
    }

    public function delete(DeleteMentorRequest $request, Mentor $mentor)
    {
        $this->deleteMentorAction->execute($mentor);

        return redirect(route('mentors.index', $mentor))
            ->with('flash.banner', "Mentor deleted!");
    }

    public function assignCourse(AssignMentorToCourseRequest $request, Mentor $mentor)
    {
        $data = new AssignCourseData($request->validated());
        $this->assignCourseToMentorAction->execute($mentor, $data);

        return redirect(route('mentors.edit', $mentor))
            ->with('flash.banner', "Mentor assigned to course!");
    }

    public function assignMentee(AssignMenteeToMentorRequest $request, Mentor $mentor)
    {
        $data = new AssignMenteeData($request->validated());
        $this->assignMenteeToMentorAction->execute($mentor, $data);

        return redirect(route('mentors.edit', $mentor))
            ->with('flash.banner', "Mentee assigned to mentor!");
    }
}
