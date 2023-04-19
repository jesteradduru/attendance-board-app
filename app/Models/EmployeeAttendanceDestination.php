<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeAttendanceDestination extends Model
{
    use HasFactory;
    protected $fillable = ['from', 'to', 'destination', 'activity'];

    public function attendance() : BelongsTo
    {
        return $this->belongsTo(EmployeeAttendance::class, 'attendance_id');
    }
}
