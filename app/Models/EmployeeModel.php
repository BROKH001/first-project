<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'name',
        'age',
        'gender',
        'phone',
        'position',
        'salary',
    ];
}
