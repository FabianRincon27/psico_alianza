<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_position', 'position_id', 'employee_id');
    }
}
