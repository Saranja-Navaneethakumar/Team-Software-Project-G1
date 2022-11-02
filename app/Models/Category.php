<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id','category_name','status','created_by'];
    //public $incrementing = false;
    public $timestamps = false;
    //const CREATED_AT = 'create_time';
    //const UPDATED_AT = 'update_time'; 

}
