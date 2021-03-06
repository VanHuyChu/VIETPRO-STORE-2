<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table='customers';
    public function order()
    {
        return $this->hasMany(order::class,'customer_id','id');
    }
    
}
