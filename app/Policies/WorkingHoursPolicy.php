<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkingHours;
use Illuminate\Auth\Access\Response;

class WorkingHoursPolicy
{
    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('View WorkingHours')){
            return true;
        }
        return false;
    }


    public function view(User $user): bool
    {
        if($user->hasPermissionTo('View WorkingHours')){
            return true;
        }
        return false;
    }

    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Create WorkingHours')){
            return true;
        }
        return false;
    }


    public function update(User $user): bool
    {
        if($user->hasPermissionTo('Update WorkingHours')){
            return true;
        }
        return false;
    }

    public function delete(User $user): bool
    {
        if($user->hasPermissionTo('Delete WorkingHours')){
            return true;
        }
        return false;
    }
}
