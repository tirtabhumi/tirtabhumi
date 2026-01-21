<?php
  
namespace App\Policies;

use App\Models\User;
use App\Models\TrainingModule;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingModulePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'partner']);
    }

    public function view(User $user, TrainingModule $record): bool
    {
        if ($user->hasAnyRole(['super_admin', 'admin'])) {
            return true;
        }

        if ($user->hasRole('partner')) {
            $training = $record->training;
            return $training && ($training->user_id === $user->id || ($user->organization_id && $training->partner && $training->partner->organization_id === $user->organization_id));
        }

        return false;
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super_admin', 'admin', 'partner']);
    }

    public function update(User $user, TrainingModule $record): bool
    {
        return $this->view($user, $record);
    }

    public function delete(User $user, TrainingModule $record): bool
    {
        return $this->view($user, $record);
    }
}
