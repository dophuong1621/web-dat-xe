<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    use HasFactory;
    protected $table = "booking_status";

    public $timestamps = false;

    public $primaryKey = "id";
}
