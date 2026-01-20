<?php

namespace App\Policies;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasRole('super_admin') || $user->hasRole('partner');
    }

    public function view(User $user, Organization $organization): bool
    {
        if ($user->hasRole('super_admin')) {
            return true;
        }

        if ($user->hasRole('partner')) {
            return (int) $user->organization_id === (int) $organization->id;
        }

        return false;
    }

    public function create(User $user): bool
    {
        return $user->hasRole('super_admin');
    }

    public function update(User $user, Organization $organization): bool
    {
        if ($user->hasRole('super_admin')) {
            return true;
        }
        return $user->organization_id === $organization->id;
    }

    public function delete(User $user, Organization $organization): bool
    {
        return $user->hasRole('super_admin');
    }
}
