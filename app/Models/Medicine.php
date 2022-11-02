<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Medicine extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'commercial_name', 
        'medical_name', 
        'company_name',
        'category', 
        'type', 
        'usage', 
        'created_by'];
    //public $incrementing = false;
    public $timestamps = false;
}



