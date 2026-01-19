<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserModuleProgress;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserModuleProgressPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'partner']);
    }

    public function view(User $user, UserModuleProgress $record): bool
    {
        if ($user->hasAnyRole(['super_admin', 'admin'])) {
            return true;
        }

        $training = $record->trainingModule->training;
        if (!$training)
            return false;

        // Check if same organization
        if ($user->organization_id && $training->partner && $training->partner->organization_id === $user->organization_id) {
            return true;
        }

        return $training->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'partner']);
    }

    public function update(User $user, UserModuleProgress $record): bool
    {
        return $this->view($user, $record);
    }

    public function delete(User $user, UserModuleProgress $record): bool
    {
        if ($user->hasAnyRole(['super_admin', 'admin'])) {
            return true;
        }

        // Partner can delete if they can view/manage it
        if ($user->hasRole('partner')) {
            return $this->view($user, $record);
        }

        return false;
    }
}
