<?php

namespace App\Invitations\Controllers;

use App\Invitations\Requests\InviteUserRequest;
use App\Invitations\ViewModels\InvitationViewModel;
use Domain\Invitations\Actions\InviteUserAction;
use Domain\Invitations\DataTransferObjects\InvitationData;

class InvitationController
{
    private InviteUserAction $inviteUserAction;

    public function __construct(InviteUserAction $inviteUserAction)
    {
        $this->inviteUserAction = $inviteUserAction;
    }

    public function create(?string $roleName = null)
    {
        return (new InvitationViewModel($roleName))->view('invitations.create');
    }

    public function store(InviteUserRequest $request)
    {
        $data = new InvitationData($request->validated());
        $this->inviteUserAction->execute($data);

        return redirect('dashboard');
    }
}
