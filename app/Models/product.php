<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=['product_name','product_price','batch_number','discount','photo'];
    function allcategory(){
        return $this->hasMany(CategoryProduct::class,'product_id','id');
    }
    function category(){
        return $this->hasone(CategoryProduct::class,'product_id','id');
    }
}
