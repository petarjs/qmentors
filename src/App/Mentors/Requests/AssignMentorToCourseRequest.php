<?php

namespace App\Mentors\Requests;

use Domain\Mentors\Rules\CourseNotAlreadyAssignedToMentor;
use Illuminate\Foundation\Http\FormRequest;

class AssignMentorToCourseRequest extends FormRequest
{
    protected $errorBag = 'assignCourse';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('assign courses to mentors');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'course_id' => ['required', 'exists:courses,id', new CourseNotAlreadyAssignedToMentor($this->mentor)],
        ];
    }
}
