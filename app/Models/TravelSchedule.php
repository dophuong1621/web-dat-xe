<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelSchedule extends Model
{
    use HasFactory;
    protected $table = "travel_schedule";

    public $timestamps = false;

    public $primaryKey = "id";

    public function bus()
    {
        return $this->hasOne(Bus::class, 'id', 'bus_id');
    }

    public function driver()
    {
        return $this->hasOne(Driver::class,'id','driver_id');
    }
}
