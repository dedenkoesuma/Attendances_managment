<?php

namespace App\Policies;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AttendancePolicy
{

    public function viewAny(User $user): bool
    {
        if($user->hasPermissionTo('View Attendance')){
            return true;
        }
        return false;
    }


    public function view(User $user): bool
    {
        if($user->hasPermissionTo('View Attendance')){
            return true;
        }
        return false;
    }


    public function create(User $user): bool
    {
        if($user->hasPermissionTo('Create Attendance')){
            return true;
        }
        return false;
    }


    public function update(User $user): bool
    {
        if($user->hasPermissionTo('Update Attendance')){
            return true;
        }
        return false;
    }


    public function delete(User $user): bool
    {
        if($user->hasPermissionTo('Delete Attendance')){
            return true;
        }
        return false;
    }

}
