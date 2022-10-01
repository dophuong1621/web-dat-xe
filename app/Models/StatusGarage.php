<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusGarage extends Model
{
    use HasFactory;
    protected $table = "status_garage";

    public $timestamps = false;

    public $primaryKey = 'status_garage_id';
}
