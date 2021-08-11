<?php

namespace Domain\Invitations\Policies;

use Domain\Invitations\Models\Invitation;
use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;

class InvitationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(['admin', 'operator']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Invitation $invitation
     * @return Response|bool
     */
    public function view(User $user, Invitation $invitation)
    {
        return $user->hasRole(['admin', 'operator']) || $user->email == $invitation->email;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @param Role $role
     * @return Response|bool
     */
    public function create(User $user, Role $role)
    {
        if ($user->hasRole(['admin'])) {
            return true;
        }

        if ($role->name === 'mentor' && $user->can('invite mentors')) {
            return true;
        }

        if ($role->name === 'mentee' && $user->can('invite mentees')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Invitation $invitation
     * @return Response|bool
     */
    public function delete(User $user, Invitation $invitation)
    {
        if ($user->hasRole(['admin'])) {
            return true;
        }

        if ($invitation->role->name === 'mentor' && $user->can('invite mentors')) {
            return true;
        }

        if ($invitation->role->name === 'mentee' && $user->can('invite mentees')) {
            return true;
        }

        return false;
    }
}
