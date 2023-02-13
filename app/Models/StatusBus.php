<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBus extends Model
{
    use HasFactory;
    protected $table = "bus_status";

    public $timestamps = false;

    public $primaryKey = 'id';
}
