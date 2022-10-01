<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acount_category extends Model
{
    use HasFactory;
    protected $table = "acount_category";

    public $timestamps = false;

    public $primaryKey = 'acount_category_id';
}
