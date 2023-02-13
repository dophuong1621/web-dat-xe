<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcountCategory extends Model
{
    use HasFactory;
    protected $table = "acount_category";

    public $timestamps = false;

    public $primaryKey = "id";
}
