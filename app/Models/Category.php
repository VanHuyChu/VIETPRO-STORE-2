<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categorys';
    public $timestamps =false;
    // 1 dang muc co nhieu san pham
    public function product()
    {
        return $this->hasMany(Products::class,'category_id','id');
    }
}
