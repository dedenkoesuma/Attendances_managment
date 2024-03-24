<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $fillable = [
        'leaves_type',
        'description',
        'quota',
    ];
    protected $guarded = ['id'];
    use HasFactory;
}
