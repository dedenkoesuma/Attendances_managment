<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as ModelRoles;

class Role extends ModelRoles
{
    use HasFactory;
}
