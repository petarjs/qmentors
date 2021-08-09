<?php

namespace App\Courses\Requests;

use Domain\Courses\Enums\CategoryEnum;
use Domain\Courses\Enums\DifficultyEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Http\Requests\TransformsEnums;
use Spatie\Enum\Laravel\Rules\EnumRule;

class StoreCourseRequest extends FormRequest
{
    use TransformsEnums;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->course) {
            return $this->user()->can('edit courses');
        } else {
            return $this->user()->can('create courses');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'category' => new EnumRule(CategoryEnum::class),
            'difficulty' => new EnumRule(DifficultyEnum::class),
            'course-trixFields' => 'required',
        ];
    }

    public function enums(): array
    {
        return [
            'category' => CategoryEnum::class,
            'difficulty' => DifficultyEnum::class,
        ];
    }
}
