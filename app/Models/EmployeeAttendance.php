<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
