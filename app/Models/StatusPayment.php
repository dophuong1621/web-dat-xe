<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPayment extends Model
{
    use HasFactory;
    protected $table = "payment_status";

    public $timestamps = false;

    public $primaryKey = 'id';
}
