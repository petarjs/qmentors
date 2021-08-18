<?php

namespace App\Mentors\Requests;

use Domain\Mentors\Rules\MenteeNotAlreadyAssignedToMentor;
use Illuminate\Foundation\Http\FormRequest;

class AssignMenteeToMentorRequest extends FormRequest
{
    protected $errorBag = 'assignMentee';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('assign mentees to mentors');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mentee_id' => ['required', 'exists:users,id', new MenteeNotAlreadyAssignedToMentor($this->mentor)],
        ];
    }
}
