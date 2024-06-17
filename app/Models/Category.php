<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];
    function allproduct(){
        return $this->hasMany(CategoryProduct::class,'category_id','id');
    }
    function product(){
        return $this->hasone(CategoryProduct::class,'category_id','id');
    }
}

