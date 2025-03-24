<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'name',
        'position_id',
        'department_id',
        'phone',
        'address',
        'hire_date',
        'status',
        'salary',
        'photo',
    ];

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
