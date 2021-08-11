<?php

namespace Domain\Invitations\Rules;

use Domain\Invitations\Models\Invitation;
use Illuminate\Contracts\Validation\Rule;

class UserNotAlreadyInvited implements Rule
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
        return !Invitation::whereEmail($value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invitation with that email already exists.';
    }
}
