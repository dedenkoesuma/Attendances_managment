<?php

namespace App\Policies;

use App\Models\Overtime;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OvertimePolicy
{
    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('View Overtimes')){
            return true;
        }
        return false;
    }


    public function view(User $user): bool
    {
        if($user->hasPermissionTo('View Overtimes')){
            return true;
        }
        return false;
    }

    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Create Overtimes')){
            return true;
        }
        return false;
    }


    public function update(User $user): bool
    {
        if($user->hasPermissionTo('Update Overtimes')){
            return true;
        }
        return false;
    }

    public function delete(User $user): bool
    {
        if($user->hasPermissionTo('Delete Overtimes')){
            return true;
        }
        return false;
    }
}
