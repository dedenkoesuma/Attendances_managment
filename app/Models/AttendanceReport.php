<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceReport extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['attendance_id'];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
    use HasFactory;
}
