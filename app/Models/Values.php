<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
    protected $table='values';
    public $timestamps =false;
    public function attribute()
    {
        return $this->belongsTo(Attributes::class, 'attr_id', 'id');
    }
    public function product()
    {
        return $this->belongsToMany(Products::class, 'values_product', 'values_id', 'product_id');
    }
}
