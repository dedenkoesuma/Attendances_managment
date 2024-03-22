<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable = [
        'date',
        'reason',
        'attachment',
    ];
    protected $guarded = ['id'];
    use HasFactory;
}
