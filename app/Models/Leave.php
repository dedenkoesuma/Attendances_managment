<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'user_id',
        'leave_types_id',
        'start_date',
        'end_date',
        'reason',
        'attachment',
    ];
    protected $guarded = ['id'];
    use HasFactory;
}
