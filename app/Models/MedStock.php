<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedStock extends Model
{
    use HasFactory;
    protected $fillable = ['id','medicine_id','stock_id'];
    public $timestamps = false;
}
