<?php

namespace Domain\Invitations\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailBelongsToOrganization implements Rule
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
        return str_ends_with($value, '@' . config('services.google.allowed_login_domain'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invitation can only be sent to organization emails.';
    }
}
