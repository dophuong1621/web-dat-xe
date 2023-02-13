<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_user extends Model
{
    use HasFactory;
    protected $table = "status_user";

    public $timestamps = false;

    public $primaryKey = 'id';
}
