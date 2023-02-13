<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;
    protected $table = "garage";

    public $timestamps = false;

    public $primaryKey = "id";

    public function garageStatus()
    {
        return $this->hasMany(StatusGarage::class,'id','status_garage');
    }
}
