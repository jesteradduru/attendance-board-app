<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Column extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function attendances() : HasMany {
        return $this->hasMany(EmployeeAttendance::class);
    }

    
}
