<?php

namespace App\Policies;

use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LeaveTypePolicy
{
    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('View LeaveType')){
            return true;
        }
        return false;
    }


    public function view(User $user): bool
    {
        if($user->hasPermissionTo('View LeaveType')){
            return true;
        }
        return false;
    }

    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Create LeaveType')){
            return true;
        }
        return false;
    }


    public function update(User $user): bool
    {
        if($user->hasPermissionTo('Update LeaveType')){
            return true;
        }
        return false;
    }

    public function delete(User $user): bool
    {
        if($user->hasPermissionTo('Delete LeaveType')){
            return true;
        }
        return false;
    }
}
