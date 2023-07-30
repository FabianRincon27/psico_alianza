<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'lastname',
        'dni',
        'email',
        'phone',
        'address',
        'country_id',
        'city_id',
        'boss_id',
        'area_id',
        'role_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function boss()
    {
        return $this->belongsTo(Employee::class, 'boss_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'employee_position', 'employee_id', 'position_id');
    }

    public function haveBoss() : Attribute
    {
        return Attribute::make(
            get: fn () => $this->boss ? $this->boss->name . ' ' . $this->boss->lastname : '',
        );
    }
}
