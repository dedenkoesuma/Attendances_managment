<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'reason',
        'attachment',
    ];
    protected $guarded = ['id'];
    use HasFactory;
}
