<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EmployeeAttendance extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'column_id',];

    public function employee() : BelongsTo {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function column() : BelongsTo {
        return $this->belongsTo(Column::class, 'column_id');
    }

    public function destination() : HasOne {
        return $this->hasOne(EmployeeAttendanceDestination::class, 'attendance_id');
    }

    public function scopeToday(Builder $query) : Builder
    {
        return $query->whereRaw('DATE(employee_attendances.created_at) = CURDATE()');
    }

    public function scopeUntilToday(Builder $query) : Builder
    {
        return $query
        ->leftJoin('employee_attendance_destinations', 'employee_attendance_destinations.attendance_id' , '=', 'employee_attendances.id')
        ->orWhereRaw('DATE(employee_attendance_destinations.to) >= CURDATE()');
    }

}
