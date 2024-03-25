<?php

namespace App\Policies;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LeavePolicy
{

    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('View Leaves')){
            return true;
        }
        return false;
    }


    public function view(User $user): bool
    {
        if($user->hasPermissionTo('View Leaves')){
            return true;
        }
        return false;
    }

    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Create Leaves')){
            return true;
        }
        return false;
    }


    public function update(User $user): bool
    {
        if($user->hasPermissionTo('Update Leaves')){
            return true;
        }
        return false;
    }

    public function delete(User $user): bool
    {
        if($user->hasPermissionTo('Delete Leaves')){
            return true;
        }
        return false;
    }
}
