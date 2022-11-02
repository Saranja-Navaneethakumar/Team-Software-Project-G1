<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['id','suppliername', 'mobile', 'address', 'previousdue', 'status', 'created_by'];
    //public $incrementing = false;
    public $timestamps = false;
}
