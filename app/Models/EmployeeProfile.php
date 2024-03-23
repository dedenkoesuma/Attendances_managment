<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    protected $fillable = ['position', 'user_id'];
    protected $guarded = ['id'];
    use HasFactory;
}
