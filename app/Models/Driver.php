<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = "driver";

    public $timestamps = false;

    public $primaryKey = "driver_id";
    // public function getGenderAttribute()
    // {
    //     if ($this->gender_driver == 0) {
    //         return "Nam";
    //     } else {
    //         return "Nữ";
    //     }
    // }
}
