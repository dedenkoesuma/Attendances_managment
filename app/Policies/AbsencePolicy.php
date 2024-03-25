<?php

namespace App\Policies;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AbsencePolicy
{

    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('View Absences')){
            return true;
        }
        return false;
    }


    public function view(User $user): bool
    {
        if($user->hasPermissionTo('View Absences')){
            return true;
        }
        return false;
    }


    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Create Absences')){
            return true;
        }
        return false;
    }


    public function update(User $user): bool
    {
        if($user->hasPermissionTo('Update Absences')){
            return true;
        }
        return false;
    }

    public function delete(User $user): bool
    {
        if($user->hasPermissionTo('Delete Absences')){
            return true;
        }
        return false;
    }
}
