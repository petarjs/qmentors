<?php

namespace Domain\Users\Rules;

use Domain\Users\Models\User;
use Illuminate\Contracts\Validation\Rule;

class EmailNotRegistered implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !User::whereEmail($value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'User is already registered.';
    }
}
