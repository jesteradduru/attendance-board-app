<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'position'];

    public function picture() : HasOne
    {
        return $this->hasOne(EmployeePicture::class, 'employee_id');
    }
}
