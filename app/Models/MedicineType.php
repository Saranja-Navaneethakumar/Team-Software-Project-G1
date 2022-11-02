<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineType extends Model
{
    use HasFactory;
    protected $fillable = ['id','type_name','status','created_by'];
    //public $incrementing = false;
    public $timestamps = false;
}
