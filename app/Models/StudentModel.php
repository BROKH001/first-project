<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'sid';
    protected $fillable = ['sname'];
    public $timestamps = false;
}
