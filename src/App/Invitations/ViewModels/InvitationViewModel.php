<?php

namespace App\Invitations\ViewModels;

use Domain\Invitations\Models\Invitation;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class InvitationViewModel extends ViewModel
{

    /**
     * @var Collection|Role[]
     */
    public $roles;

    /**
     * @var \Spatie\Permission\Contracts\Role|Role
     */
    public ?Role $selectedRole;


    public function __construct(?string $roleName)
    {
        $this->roles = Role::all();
        if ($roleName) {
            $this->selectedRole = Role::findByName($roleName, 'web');
        } else {
            $this->selectedRole = null;
        }
    }

    public function invitation(): Invitation
    {
        return new Invitation();
    }
}
