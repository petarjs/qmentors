<?php

namespace App\Invitations\Requests;

use Domain\Invitations\Models\Invitation;
use Domain\Invitations\Rules\EmailBelongsToOrganization;
use Domain\Invitations\Rules\UserNotAlreadyInvited;
use Domain\Users\Rules\EmailNotRegistered;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Role;

class InviteUserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $role = Role::findById($this->role_id, 'web');
        return $this->user()->can('create', [Invitation::class, $role]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                new UserNotAlreadyInvited,
                new EmailNotRegistered,
                new EmailBelongsToOrganization
            ],
            'role_id' => 'required|exists:roles,id',
        ];
    }
}
