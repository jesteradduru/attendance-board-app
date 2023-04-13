<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeePicture extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'employee_id'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
