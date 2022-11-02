<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        //'commercial_name',
        'medicine_id',
        'dosage',
        'unit',
        'unitprice',
        'unitcost',
        'price',
        'cost',
        'quantity',
        'expiry_date',
        'supplier_name', 
        'batch_no',
        'box_size',
        'noboxes',
        'created_by'];
    //public $incrementing = false;
    public $timestamps = false;
}
