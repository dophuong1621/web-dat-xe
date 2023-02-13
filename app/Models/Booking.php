<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "booking";

    public $timestamps = false;

    public $primaryKey = "id";

    public function schedule(){
        return $this->hasMany(TravelSchedule::class,'id','schedule_id');
    }

    public function user(){
        return $this->hasMany(User::class,'id','user_id');
    }
}
