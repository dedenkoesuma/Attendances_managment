<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHours extends Model
{
    protected $fillable = [
        'day',
        'start_time',
        'end_time',
    ];
    protected $guarded = ['id'];
    use HasFactory;
}
