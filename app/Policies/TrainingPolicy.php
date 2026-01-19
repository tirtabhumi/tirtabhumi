<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Training;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('partner') || $user->can('view_any_training');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Training $training): bool
    {
        if ($user->hasRole('super_admin') || $user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('partner')) {
            // Own mapping or Org mapping
            if ($training->user_id === $user->id)
                return true;
            if ($user->organization_id && $training->partner && $training->partner->organization_id === $user->organization_id)
                return true;
        }

        return $user->can('view_any_training') && $training->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('partner') || $user->can('create_training');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Training $training): bool
    {
        if ($user->hasRole('super_admin') || $user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('partner')) {
            // Own mapping or Org mapping
            if ($training->user_id === $user->id)
                return true;
            if ($user->organization_id && $training->partner && $training->partner->organization_id === $user->organization_id)
                return true;
        }

        if ($user->can('update_own_training') && $training->user_id === $user->id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Training $training): bool
    {
        if ($user->can('delete_any_training')) {
            return true;
        }

        if ($user->can('delete_own_training') && $training->user_id === $user->id) {
            return true;
        }

        // Check if same organization
        if ($user->organization_id && $training->partner && $training->partner->organization_id === $user->organization_id) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_training');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Training $training): bool
    {
        return $user->can('force_delete_training');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_training');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Training $training): bool
    {
        return $user->can('restore_training');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_training');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Training $training): bool
    {
        return $user->can('replicate_training');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_training');
    }
}
