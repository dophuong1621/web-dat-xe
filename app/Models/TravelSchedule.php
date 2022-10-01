<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelSchedule extends Model
{
    use HasFactory;
    protected $table = "travel_schedule";

    public $timestamps = false;

    public $primaryKey = "schedule_id";
}
