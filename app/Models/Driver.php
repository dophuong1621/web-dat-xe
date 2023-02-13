<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = "driver";

    public $timestamps = false;

    public $primaryKey = "id";

    public function driverGarage()
    {
        return $this->hasMany(Garage::class, 'id', 'driver_garage');
    }

    public function driverStatus()
    {
        return $this->hasMany(StatusDriver::class, 'id', 'status_driver');
    }

    public function driverGender()
    {
        return $this->hasMany(Gender::class, 'id', 'gender_driver');
    }
}
