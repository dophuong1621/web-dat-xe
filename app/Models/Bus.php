<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = "bus";

    public $timestamps = false;

    public $primaryKey = "id";

    public function busStatus()
    {
        return $this->hasMany(StatusBus::class,'id','bus_status');
    }
    public function busGarage()
    {
        return $this->hasMany(Garage::class,'id','bus_garage');
    }
    public function busType()
    {
        return $this->hasMany(BusType::class,'id','bus_type');
    }
}
